<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use CoreBundle\Entity\Project;

class DefaultController extends Controller
{
	public function indexAction()
	{
		return $this->render('CoreBundle::index.html.twig', array(
			'projects' => $projects,
			));
	}

	public function projectAction(Request $request)
	{
		// On affiche le formulaire de création de projet seulement si l'utilisateur a le rôle chef de projet
		if ($this->get('security.authorization_checker')->isGranted('ROLE_CP'))
		{
			$project = new Project();
			$createProjectForm = $this->createForm(FormType::class, $project)
				->add('name')
				->add('responsible', ChoiceType::class, array(
					'choices' => $this->get('dao.user')->findByRole('ROLE_DP') // Tous les directeurs de projet
					))
				->add('costToDeliver')
				->add('sellCost')
				->add('gain')
				->add('resourceAverageNumber')
				;

			if ($createProjectForm->handleRequest($request)->isSubmitted() 
				&& $createProjectForm->isValid()) 
			{
				$project->setReferent($user);
				$project->setResources(array($user, $project->getResponsible())); // On ajoute le Chef de Projet et le Directeur de Projet à la liste des ressources du projet

				$this->get('dao.project')->save($project);

				return $this->redirectToRoute('core_project');
			}

			return $this->render('CoreBundle::project.html.twig', array(
				'createProjectForm' => $createProjectForm->createView(),
			));
		}

		return $this->render('CoreBundle::project.html.twig');
	}

	public function deleteProjectAction($id)
	{
		$project = $this->get('dao.project')->find($id);

		if (!$projet) {
			throw $this->createNotFoundException("Ce projet n'existe pas");
		}

		if ($project->getReferent() !== $this->getUser()) {
			// L'utilisateur n'a pas les droits sur le projet
			throw $this->createAccessDeniedException("Vous n'êtes pas le Chef de Projet");
		}

		$this->get('dao.project')->delete($project);
		$this->addFlash('success', "Le projet a été supprimé avec succès");

		return $this->redirectToRoute('core_project');
	}

	public function editProjectAction($id, Request $request)
	{
		$project = $this->get('dao.project')->find($id);

		if (!$project) {
			throw $this->createNotFoundException("Ce projet n'existe pas");
		}

		if ($project->getReferent() !== $this->getUser()) 
		{
			throw $this->createAccessDeniedException("Vous n'êtes pas le Chef de Projet");
		}

		$editProjectForm = $this->createForm(FormType::class, $project)
			->add('name')
			->add('responsible', ChoiceType::class, array(
				'choices' => array(
					// Liste des ressources de type Directeur de Projet
					)
				))
			->add('costToDeliver')
			->add('sellCost')
			->add('gain')
			->add('resourceAverageNumber')
			;

		if ($editProjectForm->handleRequest($request)->isSubmitted() 
			&& $editProjectForm->isValid()) 
		{
			$this->get('dao.project')->save($project);
			$this->addFlash('success', "Le projet a été modifié avec succès");

			return $this->redirectToRoute('core_project');
		}

		return $this->render('CoreBundle::edit-project.html.twig', array(
			'editProjectForm' => $editProjectForm->createView()
			));
	}

	public function resourceAction()
	{
		// Toutes les resources faisant parties des projets de l'utilisateur
		$resources = $this->get('dao.user')->findByProjects($this->getUser()->getProjects());

		return $this->render('CoreBundle::resource.html.twig', array(
			'resources' => $resources,
			));
	}

	public function taskAction($id, Request $request)
	{
		// La tâche parente dans la hiérarchie
		$task = $this->get('dao.task')->find($id);
		$projects = $this->getUser()->getProjects()

		if (!$task) 
		{
			// Si la tâche n'existe pas, on retourne toutes les tâches appartenant aux projets de l'utilisateur, n'ayant pas de tâche parente, c'est à dire à la racine des projets.
			$tasks = $this->get('dao.task')->findByProjects($projects);
		}
		// Si la tâche existe, il faut vérifier que l'utilisateur fait bien partie du projet
		else if (!in_array($task->getProject(), $projects))
		{
			// Sinon, l'utilisateur se voit refuser l'accès
			// À noter que même les Chef de Projet ne peuvent consulter que leurs propres projets
			throw $this->createNotFoundException("Vous n'êtes pas affecté à ce projet");	
		}
		else
		{
			// Les tâches filles
			$tasks = $this->get('dao.task')->findByTask($task);
		}

		// Seul un chef de projet peut modifier la tâche
		if ($this->get('security.authorization_checker')->isGranted('ROLE_CP'))
		{
			$createTaskForm = $this->createForm(FormType::class, $newTask)
				->add('name')
				->add('initialWorkload')
				->add('consumedWorkload')
				->add('leftToDo')
				;

			// Si l'utilisateur est à la racine de la hiérarchie, on lui demande de choisir le projet auquel apprtient la tâche.
			// Sinon, on créé la tâche comme étant la fille de la tâche parente dans laquelle on se trouve
			if (!$task) 
			{
				$createTaskForm->add('project', ChoiceType::class, array(
					'choices' => $this->getUser()->getProjects(),
					));
			}

			if ($createTaskForm->handleRequest($request)->isSubmitted()
				&& $createTaskForm->isValid())
			{
				$newTask->setTask($task); // Sera nul si la tâche est à la racine

				$this->get('dao.task')->save($newTask);
				$this->addFlash('success', "La tâche à été créée avec succès");

				return $this->redirectToRoute('core_task');
			}

			return $this->render('CoreBundle::task.html.twig', array(
				'tasks' => $tasks,
				'form'  => $createTaskForm->createView(),
				));
		}

		return $this->render('CoreBundle::task.html.twig', array(
			'tasks' => $tasks
			));
	}

	public function deleteTaskAction($id)
	{
		$task = $this->get('dao.task')->find($id);

		if ($task === null) {
			throw $this->createNotFoundException("Cette tâche n'existe pas");
		}

		if ($task->getProject()->getReferent() !== $this->getUser()) {
			// L'utilisateur n'a pas les droits sur la tâche
			throw $this->createAccessDeniedException("Vous n'êtes pas le Chef de Projet");
		}

		$this->get('dao.task')->delete($task);
		$this->addFlash('success', "La tâche a été supprimé avec succès");

		return $this->redirectToRoute('core_task');
	}

	public function editTaskAction($id, Request $request)
	{
		$task = $this->get('dao.task')->find($id);

		if ($task === null) {
			throw $this->createNotFoundException("Cette tâche n'existe pas");
		}

		if ($task->getProject()->getReferent() !== $this->getUser()) {
			// L'utilisateur n'a pas les droits sur la tâche
			throw $this->createAccessDeniedException("Vous n'êtes pas le Chef de Projet");
		}

		// note: Un Chef de Projet ne pourra modifier la hiérarchie de la tâche après la création de cette dernière
		$editTaskForm = $this->createForm(FormType::class, $task)
			->add('name')
			->add('initialWorkload')
			->add('consumedWorkload')
			->add('leftToDo')
			->add('resources', ChoiceType::class, array(
				'choices' 	=> $task->getProject()->getResources(),
				'label'	 	=> 'username',
				'multiple' 	=> true,
				))
			;

		if ($editTaskForm->handleRequest($request)->isSubmitted() 
			&& $editTaskForm->isValid()) 
		{
			$this->get('dao.task')->save($task);
			$this->addFlash('success', "La tâche a été modifiée avec succès");

			return $this->redirectToRoute('core_task');
		}

		return $this->render('CoreBundle::edit-task.html.twig', array(
			'editTaskForm' => $editTaskForm->createView()
			));
	}
}
