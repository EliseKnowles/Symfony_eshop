<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Produit;
use App\Form\PanierType;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;


class ProduitsController extends AbstractController
{
    /**
     * Liste des produits
     * @Route("/produits", name="produits")
     */

    public function index(Request $request, TranslatorInterface $translator)
    {
        $pdo= $this->getDoctrine()->getManager();

        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ) {

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
            
            $this->addFlash("success", $translator->trans('Flash.produit.creer'));
        }

        $produits = $pdo->getRepository(Produit::class)->findAll();

        return $this->render('produits/index.html.twig', [
            'produits' => $produits,
            'form_produit_ajout' => $form->createView()
        ]);
    }


    /**
     * PAGE FICHE PRODUIT
     * @Route("/produits/{id}", name="produit_view")
     */

    public function produit(Produit $produit=null, Request $request, TranslatorInterface $translator){

        // ajout au panier
        if($produit != null){
            $panier = new Panier($produit);
            $form = $this->createForm(PanierType::class, $panier);
            $form->handleRequest($request);
            if ( $form->isSubmitted() && $form->isValid() ) {
                if ($panier->getQte() <= $produit->getStock()) {
                    $pdo = $this->getDoctrine()->getManager();
                    $pdo->persist($panier);
                    $pdo->flush();

                    $this->addFlash("success", $translator->trans('Flash.produit.aupanier'));
                }
                else {
                    $this->addFlash("danger", $translator->trans('Flash.produit.stock'));
                }
            }

            return $this->render('produits/produit.html.twig', [
                'produit' => $produit,
                'form_panier_ajout' => $form->createView()
            ]);
        }

        else{
            $this->addFlash("danger", $translator->trans('Flash.produit.inexistant'));
            return $this->redirectToRoute('produits');
        }
        
        //modification du produit 
        if($produit != null){
            // Produit exsite, on l'affiche
            $form_edit = $this->createForm(ProduitType::class, $produit);
            // Analyse la requête HTTP
            $form_edit->handleRequest($request);
            if($form_edit->isSubmitted() && $form_edit->isValid()){
                // Le formulaire a été envoyé, on le sauvegarde
                $pdo = $this->getDoctrine()->getManager();
                $pdo->persist($produit); // prepare
                $pdo->flush();           // execute

                $this->addFlash("success", "Produit mis à jour");
            }
            else {
                $this->addFlash("danger", "Erreur : Le produit n'a pas pu être mis a jour");
            }

            return $this->render('produit/produit.html.twig', [
                'produit' => $produit,
                'form_produit_edit' => $form->createView()
            ]);
        }
        else{
            // Produit n'existe pas, on redirige l'internaute
            $this->addFlash("danger", "Produit introuvable");
            return $this->redirectToRoute('home');
        }
    }


    /**
     * Accessible par les admins USER_ADMIN
     * PAGE SUPPRESSION PRODUIT
     * @Route("/produits/delete/{id}", name="produit_delete")
     */

    public function delete(Produit $produit=null, TranslatorInterface $translator){
        if($produit != null){

            if ($produit->getPhoto() !=null) {
                unlink($this->getParameter('upload_dir'). $produit->getPhoto());
            }

            $pdo = $this->getDoctrine()->getManager();
            $pdo->remove($produit);
            $pdo->flush();

            $this->addFlash("success", $translator->trans('Flash.produit.suppr'));
        }
        else{
            $this->addFlash("danger", $translator->trans('Flash.produit.inexistant'));
        }
        return $this->redirectToRoute('produits');
    }


}