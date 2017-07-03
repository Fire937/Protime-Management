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
        $resource = $this->getUser();

        return $this->render('CoreBundle::index.html.twig', array(
            'projects' => $this->get('doctrine.orm.entity_manager')->getRepository('CoreBundle:Project')->findProjects($resource),
            ));
    }

    public function projectAction(Request $request)
    {
        $resource = $this->getUser();

        $project = new Project();
        $createProjectForm = $this->createForm(FormType::class, $project)
            ->add('name')
            ->add('referent', EntityType::class, array(
                'class'         => 'UserBundle:Resource',
                'choice_label'  => 'username',
                ))
            ->add('costToDeliver')
            ->add('sellCost')
            ->add('gain')
            ->add('resourceAverageNumber')
            ;

        if ($createProjectForm->handleRequest($request)->isSubmitted() 
            && $createProjectForm->isValid()) 
        {
            $project->setResponsible($resource);

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('core_project');
        }

    	return $this->render('CoreBundle::project.html.twig', array(
            'projects'          => $this->get('doctrine.orm.entity_manager')->getRepository('CoreBundle:Project')->findProjects($resource),
            'createProjectForm' => $createProjectForm->createView(),
            ));
    }

    public function deleteProjectAction($id)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $project = $em->getRepository('CoreBundle:Project')->findOneById($id);

        if ($project && $project->getReferent() === $this->getUser())
        {
            $em->remove($project);
            $em->flush();
        }
        // if project doesn't exist or user doesn't have the rights, then do nothing and just redirect, we could send 404 error if we were really bothered

        return $this->redirectToRoute('core_project');
    }

    public function editProjectAction($id, Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $project = $em->getRepository('CoreBundle:Project')->findOneById($id);

        if ($project->getReferent() !== $this->getUser()) 
        {
            throw $this->createAccessDeniedException("Vous ne pouvez pas modifier les projets dans lesquels vous n'êtes pas le chef de projet");
        }

        // Yes, same form than in projectAction but creating a FormType is a pain
        $editProjectForm = $this->createForm(FormType::class, $project)
            ->add('name')
            ->add('referent', EntityType::class, array(
                'class'         => 'UserBundle:Resource',
                'choice_label'  => 'username',
                ))
            ->add('costToDeliver')
            ->add('sellCost')
            ->add('gain')
            ->add('resourceAverageNumber')
            ;

        if ($editProjectForm->handleRequest($request)->isSubmitted() 
            && $editProjectForm->isValid()) 
        {
            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('core_project');
        }

        return $this->render('CoreBundle::edit-project.html.twig', array(
            'editProjectForm' => $editProjectForm->createView()
            ));
    }

    public function resourceAction()
    {
    	return $this->render('CoreBundle::resource.html.twig');
    }

    public function taskAction()
    {
    	return $this->render('CoreBundle::task.html.twig');
    }
}
