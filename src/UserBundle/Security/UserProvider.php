<?php

namespace UserBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

use UserBundle\Entity\User;

class UserProvider implements UserProviderInterface
{
	public function __construct()

	public function loadUserByUsername($username)
	{
		$userData = 

		if ($userData) {
			$password = '...';

			// ...

			return new WebserviceUser($username, $password, $salt, $roles);
		}

		throw new UsernameNotFoundException(
			sprintf('Username "%s" does not exist.', $username)
			);
	}

	public function refreshUser(UserInterface $user)
	{
		if (!$user instanceof WebserviceUser) {
			throw new UnsupportedUserException(
				sprintf('Instances of "%s" are not supported.', get_class($user))
				);
		}

		return $this->loadUserByUsername($user->getUsername());
	}

	public function supportsClass($class)
	{
		return WebserviceUser::class === $class;
	}
}