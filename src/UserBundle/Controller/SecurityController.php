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
			$this->addFlash('success', "Connexion réussie");
			return $this->redirectToRoute('core_homepage');
		}

		// Sinon on s'occupe d'afficher le formulaire de connexion
		$authenticationUtils = $this->get('security.authentication_utils');

		return $this->render('UserBundle:Security:login.html.twig', array(
			'last_username' => $authenticationUtils->getLastUsername(),
			'error'         => $authenticationUtils->getLastAuthenticationError(),
			));
	}

	/**
	 * Les utilisateurs ne peuvent pas s'enregistrer par eux même, un Chef de Projet doit le faire à leur place
	 */
	public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
	{
		// Pareil, si l'utilisateur est déjà connecté, il n'a pas besoin de créer un compte, on le redirige
		if (!$this->get('security.authorization_checker')->isGranted('ROLE_CP')) {
			return $this->createAccessDeniedException("Vous n'êtes pas un Chef de Projet");
		}

		// Sinon on lance le processus de création d'utilisateur
		$user = new User();
		$registrationForm = $this->createForm(RegistrationType::class, $user);

		if ($registrationForm->handleRequest($request)->isSubmitted() && $registrationForm->isValid()) 
		{
			// On hash le mot de passe (bcrypt)
			$password = $passwordEncoder->encodePassword($user, $registrationForm->get('plainPassword')->getData()); 
			$user->setPassword($password);

			// On l'insert dans la base de donnée
			$this->get('dao.user')->save($user);
			$this->addFlash('success', "La ressource à été créée avec succès");

			return $this->redirectToRoute('user_register');
		}

		return $this->render('UserBundle:Registration:register.html.twig', array(
			'form' => $registrationForm->createView(),
			));
	}

	public function deleteAction($id)
	{
		// Seul les chefs de projet peuvent supprimer des ressources
		if (!$this->get('security.authorization_checker')->isGranted('ROLE_CP')) {
			throw $this->createAccessDeniedException("Vous n'êtes pas un Chef de Projet");
		}

		$resource = $this->get('dao.user')->find($id);

		if (!$resource) {
			throw $this->createNotFoundException("Cette resource n'existe pas");
		}

		if ($resource->getRole() === 'ROLE_CP') {
			throw $this->createAccessDeniedException("Vous ne pouvez pas supprimer un Chef de Projet");
		}

		$this->get('dao.user')->delete($resource);
		$this->addFlash('success', "La ressource vient d'être supprimée");

		return $this->redirectToRoute('core_resource');
	}

	public function editAction($id)
	{
		if (!$this->get('security.authorization_checker')->isGranted('ROLE_CP')) {
			throw $this->createAccessDeniedException("Vous n'êtes pas un Chef de Projet");
		}

		$resource = $this->get('dao.user')->find($id);

		if (!$resource) {
			throw $this->createNotFoundException("Cette ressource n'existe pas");
		}

		if ($resource->getRole() === 'ROLE_CP') {
			throw $this->createAccessDeniedException("Vous ne pouvez pas modifier un Chef de Projet");
		}

		$editForm = $this->createForm(EditType::class, $resource);
		if ($editForm->handleRequest($request)->isSubmitted()
			&& $editForm->isValid()) 
		{
			$this->get('dao.user')->save($resource); // On enregistre la resource modifiée dans la base de donnée
			$this->addFlash('success', "La ressource a été créée avec succès");

			return $this->redirectToRoute('core_resource');
		}

		return $this->render('UserBundle::edit-resource.html.twig', array(
			'editForm' => $form,
			))
	}
}