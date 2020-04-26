<?php

namespace App\Controller;

use App\Repository\PanierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(PanierRepository $panierRepository)
    {
        // panier non acheter 
        $panierEnCours = $panierRepository->findBy(['etat'=> false]);

        return $this->render('admin/index.html.twig', [
            'enCours' => $panierEnCours,
            'controller_name' => 'AdminController',
        ]);
    }
}
