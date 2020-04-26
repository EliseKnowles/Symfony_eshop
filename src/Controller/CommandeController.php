<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\User;
use App\Repository\CommandeRepository;
use DateTime;
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
     * ACHAT DU PANIER
     * @Route("/commande/achat", name="commande_achat")
     */

    public function achat(CommandeRepository $commandeRepository) {
        
        $commande = $commandeRepository->findOneBy([
            'user' => $this->getUser(), 
            'etat' => false ]);

        $pdo = $this->getDoctrine()->getManager();
        $user = $pdo->getRepository(User::class)->findOneBy([]);
        $commande = new Commande();

        $commande->getUser($user->getId());
        $commande->setEtat(true);
        $commande->setDateAchat(new \DateTime());

        $pdo->persist($commande);
        $pdo->flush();

        $this->addFlash('success', 'Commande validé');

        return $this->redirectToRoute('produits');
    }
}

