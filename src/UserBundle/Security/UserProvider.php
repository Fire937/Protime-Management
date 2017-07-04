<?php

namespace UserBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

use UserBundle\Entity\User;
use UserBundle\DAO\UserDAO;

class UserProvider implements UserProviderInterface
{
	private $userDAO;

	public function __construct(UserDAO $userDAO)
	{
		$this->userDAO = $userDAO;
	}

	public function loadUserByUsername($username)
	{
		$user = $this->userDAO->findByUsername($username);

		if (!$user) {
			throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
		}

		return $user;
	}

	public function refreshUser(User $user)
	{
		if (!$user instanceof User) {
			throw new UnsupportedUserException(sprintf('Expected an instance of UserBundle\Entity\User, but got "%s".', get_class($user)));
		}

		if (!($reloadedUser = $this->userDAO->find($user->getId()))) {
			throw new UsernameNotFoundException(sprintf('User with ID "%s" could not be reloaded.', $user->getId()));
		}

		return $reloadedUser;
	}

	public function supportsClass($class)
	{
		return User::class === $class;
	}
}