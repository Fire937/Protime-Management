<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle:index.html.twig');
    }

    public function projectAction()
    {
    	return $this->render('CoreBundle:project.php');
    }

    public function ressourceAction()
    {
    	return $this->render('CoreBundle:ressources.php');
    }

    public function taskAction()
    {
    	return $this->render('CoreBundle:tasks.php');
    }
}
