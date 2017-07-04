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
	 * Returns all user with ROLE_DP or ROLE_DEV
	 *
	 * @return array
	 */
	public function findResources()
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