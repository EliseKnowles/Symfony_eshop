<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\User;
use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    public function index(CommandeRepository $commandeRepository)
    {
        $panier = $commandeRepository-> findOneBy(['utilisateur'=> $this->getUser(), 'etat'=> false]);

        return $this->render('commande/index.html.twig', [
            'panier' => $panier,
        ]);
    }

    /**
     * Achat du panier
     * @Route("/commande/achat", name="commande_achat")
     */

    public function achat(CommandeRepository $commandeRepository) {
        
        // la commande non acheté de l'utilisateur 
        $commande = $commandeRepository->findOneBy([
            'user' => $this->getUser(), 
            'etat' => false ]);

        $pdo = $this->getDoctrine()->getManager();
        $user = $pdo->getRepository(User::class)->findOneBy([]);
        $commande = new Commande();

        //l'User prend l'ID de la commande
        $commande->getUser($user->getId());
        //On change l'état de la commande en payé (true)
        $commande->setEtat(true);
        //On définie la date d'achat 
        $commande->setDateAchat(new \DateTime());

        $pdo->persist($commande);
        $pdo->flush();

        //msg Flash 
        $this->addFlash('success', 'Commande validé');

        //redirection
        return $this->redirectToRoute('produits');
    }
}

