<?php

namespace CoreBundle\DAO;


abstract class DAO 
{
	/**
	 * Database connection
	 *
	 * @var \mysqli Connexion mysqli
	 */
	private $db;

	public function __construct(CoreBundle\DBAL\DBAL $db) {
		$this->db = $db;
	}

	/**
	 * Grants access to the database connection object
	 */
	protected function getDb() {
		return $this->db;
	}

	/**
	 * Builds an object from a DB row.
	 * Must be overridden by child classes.
	 *
	 * @param array
	 */
	protected abstract function buildObject($row);
}