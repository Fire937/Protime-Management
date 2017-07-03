<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use UserBundle\Form\RegistrationType;
use UserBundle\Entity\User;

class SecurityController extends Controller
{
	public function loginAction(Request $request)
	{
		// Si l'utilisateur est déjà connecté, on le redirige vers la page d'accueil
		if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
			return $this->redirectToRoute('core_homepage');
		}

		// Sinon on s'occupe d'afficher le formulaire de connexion
		$authenticationUtils = $this->get('security.authentication_utils');

		return $this->render('UserBundle:Security:login.html.twig', array(
			'last_username' => $authenticationUtils->getLastUsername(),
			'error'         => $authenticationUtils->getLastAuthenticationError(),
			));
	}

	public function registerAction(Request $request)
	{
		// Pareil, si l'utilisateur est déjà connecté, il n'a pas besoin de créer un compte, on le redirige
		if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
			return $this->redirectToRoute('core_homepage');
		}

		// Sinon on lance le processus d'inscription
		$user = new User();
		$registrationForm = $this->createForm(RegistrationType::class, $user);

		if ($registrationForm->handleRequest($request)->isSubmitted() && $registrationForm->isValid()) 
		{
			// On inscrit l'utilisateur, on lui assigne le role de Chef de Projet
			$user->setRole('ROLE_CP');

			
		}

	}
}