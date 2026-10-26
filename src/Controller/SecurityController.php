<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use App\Entity\Admin;

class SecurityController extends AbstractController
{

    public function __construct(private ManagerRegistry $doctrine)
    {
    }
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, UserPasswordHasherInterface $encoder): Response
    {
        /*$request = Request::createFromGlobals();
        $entityManager = $this->doctrine->getManager();

        $newAdmin = new Admin();
        $newAdmin->setUsername( "niks" );
        $newAdmin->setName( "Niks" );

        $newAdmin->setPassword( $encoder->hashPassword($newAdmin, "niks") );
        $newAdmin->setRoles( array("ROLE_SUPERADMIN") );

        $entityManager->persist($newAdmin);
        $entityManager->flush();//*/

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin/pages/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
}
