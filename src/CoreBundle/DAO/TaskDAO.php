<?php

namespace CoreBundle\DAO;

use CoreBundle\DAO\DAO;
use CoreBundle\Entity\Task;

class TaskDAO extends DAO
{
	public function find($id)
	{

	}

	/**
	 * Retourne toutes les tâches filles de la tache donnée en paramètre
	 */
	public function findByTask(\CoreBundle\Entity\Task $task)
	{

	}

	public function findByProjects($projects)
	{
		
	}

	/**
	 * Update task, or insert it if already exists
	 */
	public function save(\CoreBundle\Entity\Task $task)
	{

	}

	protected function buildObject($row)
	{
		
	}
}