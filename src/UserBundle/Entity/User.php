<?php

namespace UserBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
	private $id;

	/**
	 * @var string
	 */
	private $username;

	/**
	 * @var string
	 */
	private $firstName;

	/**
	 * @var string
	 */
	private $lastName;

	/**
	 * @var string
	 */
	private $password;

	/**
	 * @var string
	 */
	private $salt;

	/**
	 * @var string|null We say a user can only have one role, or none
	 */
	private $roles;

	public function eraseCredentials()
	{
	}
}