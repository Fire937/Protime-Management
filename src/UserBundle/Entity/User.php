<?php

namespace UserBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

class User implements UserInterface, EquatableInterface
{
	private $id;

	/**
	 * @var string
	 */
	private $username;

	/**
	 * @var string
	 */
	private $email;

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
	 * @var string|null We say a user can only have one role, or none
	 */
	private $role;

	private $projects;

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

	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	public function getEmail()
	{
		return $this->email;
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

	public function getSalt()
	{
		return null; // bcrypt has built-in salt
	}

	public function setRole($role)
	{
		$this->role = $role;

		return $this;
	}

	public function getRole()
	{
		return $this->role;
	}

	public function getRoles()
	{
		return array($this->role);
	}

	public function setProjects($projects)
	{
		$this->projects = $projects;

		return $this;
	}

	public function getProjects()
	{
		return $this->projects;
	}

	public function isEqualTo(UserInterface $user)
	{
		if (!$user instanceof User || $user->getId() !== $this->id) {
			return false;
		}

		return true;
	}
}