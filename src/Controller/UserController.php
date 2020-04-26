<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\UserAuthentificatorAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class UserController extends AbstractController
{
    /**
     * @Route("/user/{id}", name="user")
     */
    public function index(User $user=null, Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, UserAuthentificatorAuthenticator $authenticator)
    {
        if($user == null){
            return $this->redirectToRoute('login');
        }

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                $user,
                $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );

        }

        return $this->render('user/index.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);

    }

    /**
    * @Route("/user/{id}/editRole", name="edit_role")
    */
    public function edit_role()
    {
        
    $role = ['ROLE_SUPER_ADMIN'];
    
    $user = $this->getUser();
    
    $user->setRoles($role);
    
    $em = $this->getDoctrine()->getManager();
    $em->persist($user);
    $em->flush();
    
    return $this->redirectToRoute('produits');
    }
}
