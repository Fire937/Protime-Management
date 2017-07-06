<?php

namespace CoreBundle\DAO;

use CoreBundle\DAO\DAO;
use UserBundle\Entity\User;
use UserBundle\Entity\Project;

class ProjectDAO extends DAO
{
	public function find($id)
	{
		$db = $this->getDb()->getMysqli();
		$sql = "SELECT * FROM project WHERE id = $id";
		$row = $db->query($sql)->fetch_assoc();
		return $this->buildObject($row);
	}

	public function delete(Project $project)
	{
		$db = $this->getDb()->getMysqli();
		$stmt =  $db->prepare("DELETE FROM project WHERE id = ?");

		$id = $project->getId();
		$stmt->bind_param('i', $id);

		$stmt->execute();
	}

	public function save(Project $project)
	{
		$exist =  ($this->find($project->getId()) == null ? true : false);
		$db = $this->getDb()->getMysqli();

		
		$stmt->execute();
	}

	protected function buildObject($row)
	{
		
	}
}