<?php

namespace CoreBundle\DAO;

use CoreBundle\DAO\DAO;
use UserBundle\Entity\User;
use UserBundle\Entity\Project;

class ProjectDAO extends DAO
{
	public function find($id)
	{

	}

	public function findByUser(User $user)
	{
		// Les projets dans lequel l'utilisateur est ressource, référent ou responsable
		// Un chef de projet n'a normalement que des projets où il est chef de projet
		// Seul les utilisateurs ayant le role ROLE_DP peuvent être référents
		// Les utilisateurs ayant le role ROLE_DEV ne peuvent qu'être ressources
	}

	public function delete(Project $project)
	{

	}

	protected function buildObject($row)
	{
		
	}
}