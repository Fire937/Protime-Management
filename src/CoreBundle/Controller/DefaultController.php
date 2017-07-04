<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

use CoreBundle\Entity\Project;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $projects = $this->get('dao.projects')->findByUser($user);

        return $this->render('CoreBundle::index.html.twig', array(
            'projects' => $projects,
            ));
    }

    public function projectAction(Request $request)
    {
        $user = $this->getUser();
        $projects = $this->get('dao.projects')->findByUser($user);

        $project = new Project();
        $createProjectForm = $this->createForm(FormType::class, $project)
            ->add('name')
            // Le chef de projet créé une ressource de type Directeur de Projet qui sera le référent du projet, à la création du projet.
            ->add('referent', RegistrationType::class)
            ->add('costToDeliver')
            ->add('sellCost')
            ->add('gain')
            ->add('resourceAverageNumber')
            ;

        if ($createProjectForm->handleRequest($request)->isSubmitted() 
            && $createProjectForm->isValid()) 
        {
            $project->setResponsible($user);

            $this->get('dao.project')->save($project);

            return $this->redirectToRoute('core_project');
        }

    	return $this->render('CoreBundle::project.html.twig', array(
            'projects'          => $projects,
            'createProjectForm' => $createProjectForm->createView(),
            ));
    }

    public function deleteProjectAction($id)
    {
        $project = $this->get('dao.project')->find($id);

        if (!$projet) {
            throw $this->createNotFoundException("Ce projet n'existe pas");
        }

        if ($project->getReferent() !== $this->getUser()) {
            // L'utilisateur n'a pas les droits sur le projet
            throw $this->createAccessDeniedException("Vous n'êtes pas le Chef de Projet")
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

        // Yes, same form than in projectAction but creating a FormType is a pain
        $editProjectForm = $this->createForm(FormType::class, $project)
            ->add('name')
            ->add('referent', ChoiceType::class, array(
                'choices' => array(
                    // Liste des ressources sur le projet (le directeur de projet en fait partie et est sélectionné par défaut)
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
    	return $this->render('CoreBundle::resource.html.twig', array(
            
            ));
    }

    public function taskAction()
    {
    	return $this->render('CoreBundle::task.html.twig');
    }
}
