<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Produit;
use App\Form\PanierType;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/produits")
 */

class ProduitsController extends AbstractController
{
    /**
     * Liste des produits
     * @Route("/", name="produits", methods={"GET"})
     */
    public function index(ProduitRepository $produitRepository) : Response
    {
        return $this->render('produits/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);

    }

    /**
     * Nouveau Produit
     * @Route("/new", name="produit_new", methods={"GET","POST"})
     */
    public function new(Request $request, TranslatorInterface $translator) : Response
    {
        $pdo= $this->getDoctrine()->getManager();
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid() ) {
            //ajout photo
            $photo = $form->get('photo')->getData();
            if($photo){
                $nomPhoto = uniqid().'.'.$photo->guessExtension();
                try {
                    $photo->move(
                        $this->getParameter('upload_dir'),
                        $nomPhoto
                    );
                }
                catch (FileException $e) {
                    $this->addFlash('danger', $translator->trans('Flash.produit.erreur'));
                    return $this->redirectToRoute('produits');
                }

                $produit->setPhoto($nomPhoto);
            }

            $pdo->persist($produit);
            $pdo->flush();
            
            //redirection
            return $this->redirectToRoute('produits');
            //msg Flash 
            $this->addFlash("success", $translator->trans('Flash.produit.creer'));
        }

        return $this->render('produits/new.html.twig', [
            'produits' => $produit,
            'form' => $form->createView()
        ]);
    }


    /**
     * Page Fiche Produit
     * @Route("/{id}", name="produit_view")
     */

    public function produit(Produit $produit=null, Request $request, TranslatorInterface $translator){

        // Ajout au panier
        if($produit != null){
            $panier = new Panier($produit);
            $form = $this->createForm(PanierType::class, $panier);
            $form->handleRequest($request);
            if ( $form->isSubmitted() && $form->isValid() ) {
                if ($panier->getQte() <= $produit->getStock()) {
                    $panier->setCommande($panier->getId());
                    $pdo = $this->getDoctrine()->getManager();
                    $pdo->persist($panier);
                    $pdo->flush();

                    // msg Flash
                    $this->addFlash("success", $translator->trans('Flash.produit.aupanier'));
                }
                else {
                    //msg Flash 
                    $this->addFlash("danger", $translator->trans('Flash.produit.stock'));
                }
            }

            return $this->render('produits/produit.html.twig', [
                'produit' => $produit,
                'form_panier_ajout' => $form->createView()
            ]);
        }
        else{
            //msg Flash 
            $this->addFlash("danger", $translator->trans('Flash.produit.inexistant'));
            // redirection 
            return $this->redirectToRoute('produits');
        }
        
    }

    /**
     * accessible aux USER_ADMIN
     * Page Modification du Produit 
     * @Route("/edit/{id}", name="edit_produit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produit $produit): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            //redirection
            return $this->redirectToRoute('produits');
        }

        return $this->render('produits/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Accessible par les admins USER_ADMIN
     * Page Suppression du Produit
     * @Route("/produits/delete/{id}", name="produit_delete")
     */

    public function delete(Produit $produit=null, TranslatorInterface $translator){
        if($produit != null){

            //suppression de la photo 
            if ($produit->getPhoto() !=null) {
                unlink($this->getParameter('upload_dir'). $produit->getPhoto());
            }

            $pdo = $this->getDoctrine()->getManager();
            $pdo->remove($produit);
            $pdo->flush();

            //msg Flash 
            $this->addFlash("success", $translator->trans('Flash.produit.suppr'));
        }
        else{
            //msg Flash 
            $this->addFlash("danger", $translator->trans('Flash.produit.inexistant'));
        }
        //redirection
        return $this->redirectToRoute('produits');
    }
}
