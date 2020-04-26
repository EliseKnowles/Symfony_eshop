<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use App\Repository\PanierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    public function index()
    {
        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }

    /**
     * ACHAT DU PANIER
     * @Route("/commande/achat", name="commande_achat")
     */

    public function achat(CommandeRepository $commandeRepository) {
        
        $commande = $commandeRepository->findOneBy([
            'user' => $this->getUser(), 
            'state' => false ]);

        $pdo = $this->getDoctrine()->getManager();

        $commande->setEtat(true);
        $commande->setDateAchat(new\Datetime());

        $pdo->persist($commande);
        $pdo->flush();

        return $this->redirectToRoute('produits');
    }
}

