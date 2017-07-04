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

	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	public function setUsername($username)
	{
		$this->username = $username;

		return $this;
	}

	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Set firstName
	 *
	 * @param string $firstName
	 *
	 * @return Resource
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;

		return $this;
	}

	/**
	 * Get firstName
	 *
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * Set lastName
	 *
	 * @param string $lastName
	 *
	 * @return Resource
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;

		return $this;
	}

	/**
	 * Get lastName
	 *
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setSalt($salt)
	{
		$this->salt = $salt;

		return $this;
	}

	public function getSalt($salt)
	{
		return $this->salt;
	}

	public function setRoles($roles)
	{
		$this->roles = $roles;

		return $this;
	}

	public function getRoles($roles)
	{
		return $this->roles;
	}
}