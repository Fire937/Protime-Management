<?php

namespace UserBundle\DAO;

use CoreBundle\DAO\DAO;
use UserBundle\Entity\User;

class UserDAO extends DAO
{
	/**
	 * @param integer
	 *
	 * @return \UserBundle\Entity\User|null
	 */
	public function find($id)
	{
		
	}

	/**
	 * @param string
	 *
	 * @return \UserBundle\Entity\User|null
	 */
	public function findByUsername($username)
	{

	}

	/**
	 * Retourne toutes les resources affectées aux projets donnés en paramètre
	 *
	 * @param array A list of projects
	 * @return array
	 */
	public function findByProjects($projects)
	{

	}

	/**
	 * Retourne tous les utilisateurs ayant un certain rôle (ex: ROLE_DP)
	 */
	public function findByRole($role)
	{

	}

	/**
	 * Saves the user in database, update if already exists, create if doesn't exist
	 */
	public function save(User $user)
	{

	}

	protected function buildObject($row)
	{

	}
}