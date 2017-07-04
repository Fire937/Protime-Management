<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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

	public function registerAction(Request $request, UserPasswordEncoderInterface $encoder = null)
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
			// On inscrit l'utilisateur
			$salt = rtrim(str_replace('+', '.', base64_encode(random_bytes(32))), '='); // Création du sel
			$user->setSalt($salt);
			$password = $encoder->encodePassword($user, $registrationForm->getData()['plainPassword']); // On encode le mot de passe (sha512 + salt)
			$user->setPassword($password);

			$user->setRoles(array('ROLE_CP')); // On lui assigne le rôle Chef de Projet

			$this->get('dao.user')->save($user);

			return $this->redirectToRoute('user_login'); // L'utilisateur peut à présent se connecter en tant que Chef de Projet.
		}

		return $this->render('UserBundle:Registration:register.html.twig', array(
			'form' => $registrationForm->createView(),
			));
	}
}