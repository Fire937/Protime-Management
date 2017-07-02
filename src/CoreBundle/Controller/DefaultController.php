<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle::index.html.twig', array(
            'projects' => array(array('name' => 'Hello World'))
            ));
    }

    public function projectAction()
    {
    	return $this->render('CoreBundle::project.html.twig');
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
