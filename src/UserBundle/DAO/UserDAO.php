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
		$conn = new UserDAO;
		$db = $conn->getDb();
		$sql = "SELECT * FROM user WHERE id = $id";
		$rows = $db->query($sql);
		return $this->buildObject($rows);
	}

	/**
	 * @param string
	 *
	 * @return \UserBundle\Entity\User|null
	 */
	public function findByUsername($username)
	{
		$conn = new DOA;
		$db = $conn->getDb();
		$sql = "SELECT * FROM user WHERE username = $username";
		$rows = $db->query($sql);
		return $this->buildObject($rows);
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
		$conn = new DOA;
		$db = $conn->getDb();
		$sql = "SELECT * FROM user WHERE role = $role";
		$rows = $db->query($sql);
		return $this->buildObject($rows);
	}

	/**
	 * Saves the user in database, update if already exists, create if doesn't exist
	 */
	public function save(User $user)
	{	
		$exist =  ($this->find($user->getId()) == null ? true : false);
		$conn = new DOA;
		$db = $conn->getDb();
		if ($exist) {
			$stmt = $db->prepare("INSERT INTO user SET username = ?, email = ?, first_name = ?, last_name = ?,  role = ? WHERE publish_date > ?");
		} elseif (!$exist) {
			$stmt = $db->prepare("INSERT INTO user (username, email, first_name, last_name, role) VALUES (?, ?, ?, ?, ?) WHERE publish_date > ?");
		}
		
		$stmt->bindValue(1, $user->getUsername());
		$stmt->bindValue(2, $user->getEmail());
		$stmt->bindValue(3, $user->getFirstName());
		$stmt->bindValue(4, $user->getLastName());
		$stmt->bindValue(5, $user->getRole());
		$stmt->bindValue(6, $id);
		
		$rows = $stmt->execute($sql);
	}

	protected function buildObject($row)
	{
	}
}