<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use CoreBundle\Entity\Project;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $resource = $this->getUser();

        return $this->render('CoreBundle::index.html.twig', array(
            'projects' => $this->get('doctrine.orm.entity_manager')->getRepository('UserBundle:Resource')->findProjects($resource),
            ));
    }

    public function projectAction(Request $request)
    {
        $createProjectForm = $this->createForm()
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

        if ($form->handleRequest($request)->isSubmitted() && $form->handleRequest($request)->isValid()) 
        {
            $projectData = $form->getData();

            $project = new Project();
            $project
                ->setName($projectData['name'])
                ->setReferent($projectData['referent'])
                ->setCostToDeliver($projectData['costToDeliver'])
                ->setSellCost($projectData['sellCost'])
                ->setGain($projectData['gain'])
                ->setResourceAverageNumber($projectData['resourceAverageNumber'])
                ->setResponsible($this->getUser())
                ;

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('core_project');
        }

    	return $this->render('CoreBundle::project.html.twig', array(
            'createProjectForm' => $createProjectForm->createView()
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
