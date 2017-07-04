<?php

namespace UserBundle\DAO;

use CoreBundle\DAO\DAO;

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
	 * Saves the user in database, update if already exists, create if doesn't exist
	 */
	public function save(User $user)
	{

	}

	protected function buildObject($row)
	{

	}
}