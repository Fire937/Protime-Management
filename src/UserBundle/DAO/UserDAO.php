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
		// TODO: find that DB object...
		$db = $this->getDb()->getMysqli();
		error_log($id);
		$sql = "SELECT * FROM user WHERE id = $id";
		$row = $db->query($sql)->fetch_assoc();
		return $this->buildObject($row);
	}

	/**
	 * @param string
	 *
	 * @return \UserBundle\Entity\User|null
	 */
	public function findByUsername($username)
	{
		$db = $this->getDb()->getMysqli();
		$sql = "SELECT * FROM user WHERE username = '$username'";
		$row = $db->query($sql)->fetch_assoc();

		return $this->buildObject($row);
	}

	/**
	 * Retourne toutes les resources affectées aux projets donnés en paramètre
	 *
	 * @param array A list of projects
	 * @return array
	 */
	public function findByProjects($projects)
	{
		//$conn = new DOA
		//$db = $conn->getDb();
		//$sql = "SELECT * FROM user INNER JOIN resource_task ON user.id = resource_task.user_id INNER JOIN task ON resource_task.task_id = task.id WHERE task.project_id IN ($ids)";
		//$rows = $db->query($sql);
		//return $this->buildObject($rows);
	}

	/**
	 * Retourne tous les utilisateurs ayant un certain rôle (ex: ROLE_DP)
	 */
	public function findByRole($role)
	{
		$db = $this->getDb()->getMysqli();
		$sql = "SELECT * FROM user WHERE role = '$role'";
		$rows = $db->query($sql)->fetch_all(MYSQLI_ASSOC);

		foreach ($rows as $row) {
			$row = $this->buildObject($row);
		}

		return $rows;
	}

	/**
	 * Saves the user in database, update if already exists, create if doesn't exist
	 */
	public function save(User $user)
	{	
		$exist =  ($this->find($user->getId()) == null ? true : false);
		$db = $this->getDb()->getMysqli();

		$username = $user->getUsername();
		$email = $user->getEmail();
		$firstName = $user->getFirstName();
		$lastName = $user->getLastName();
		$role = $user->getRole();
		$password = $user->getPassword();
		$id = $user->getId();

		if ($exist) {
			$stmt = $db->prepare("UPDATE user SET username = ?, email = ?, first_name = ?, last_name = ?,  role = ?, password = ? WHERE id = ?");
			$stmt->bind_param('ssssssi', $username, $email, $firstName, $lastName, $role, $password, $id);
		} else {
			$stmt = $db->prepare("INSERT INTO user (username, email, first_name, last_name, password, role) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('ssssss', $username, $email, $firstName, $lastName, $password, $role);
		}
		
		$stmt->execute();
	}

	protected function buildObject($row)
	{
		$user = new User();

		error_log(print_r($row, true));

		$user
			->setId($row['id'])
			->setUsername($row['username'])
			->setEmail($row['email'])
			->setFirstName($row['first_name'])
			->setLastName($row['last_name'])
			->setPassword($row['password'])
			->setRole($row['role'])
			//TODO: use project dao in order to inject projects here => findProjectsByUser
			//->setProjects()
			;

		/*$user->setUsername($row['username']);
		error_log('1');
		$user->setEmail($row['email']);
		$user->setFirstName($row['first_name']);
		$user->setLastName($row['last_name']);
		$user->setPassword($row['password']);
		$user->setRole($row['role']);*/

		error_log('uh');
		error_log(print_r($user, true));

		return $user;
	}
}