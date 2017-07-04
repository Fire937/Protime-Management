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
	public function findTask(\CoreBundle\Entity\Task $task)
	{

	}

	protected function buildObject($row)
	{
		
	}
}