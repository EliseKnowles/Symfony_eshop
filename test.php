public function achat(CommandeRepository $commandeRepository) {
        
        $commande = $commandeRepository->findOneBy([
            'user' => $this->getUser(), 
            'etat' => false ]);

        $pdo = $this->getDoctrine()->getManager();

        $commande->setEtat(true);
        $commande->setDateAchat(new\Datetime());

        $pdo->persist($commande);
        $pdo->flush();

        return $this->redirectToRoute('produits');
    }

    $panier = $pdo->getRepository(Panier::class)->findAll();

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