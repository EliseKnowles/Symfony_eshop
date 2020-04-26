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