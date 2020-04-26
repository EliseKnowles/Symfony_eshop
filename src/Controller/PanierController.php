<?php

namespace App\Controller;

use App\Entity\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class PanierController extends AbstractController
{
    /**
     * Page Panier
     * @Route("/", name="panier")
     */

    public function index()
    {
        $pdo = $this->getDoctrine()->getManager();
        $panier = $pdo->getRepository(Panier::class)->findAll();

        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
        ]);
    }

    /**
     * Suppression d'un article 
     * @Route("/panier/delete/{id}", name="panier_delete")
     */

    public function delete(Panier $panier=null, TranslatorInterface $translator){
        if($panier != null){
            $pdo = $this->getDoctrine()->getManager();
            $pdo->remove($panier);
            $pdo->flush();

            //msg Flash 
            $this->addFlash("success", $translator->trans('Flash.panier.suppr'));
        }
        else{
            //msg Flash 
            $this->addFlash("danger", $translator->trans('Flash.panier.erreur'));
        }
        //redirection
        return $this->redirectToRoute('panier');
    }
}