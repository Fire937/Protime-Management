<?php

namespace CoreBundle\DAO;


abstract class DAO 
{
	/**
	 * Database connection
	 *
	 * @var \mysqli Connexion mysqli
	 */
	private $mysqli;

	public function __construct(\mysqli $mysqli) {
		$this->mysqli = $mysqli;
	}

	/**
	 * Grants access to the database connection object
	 */
	protected function getDb() {
		return $this->mysqli;
	}

	/**
	 * Builds an object from a DB row.
	 * Must be overridden by child classes.
	 */
	protected abstract function buildObject($row);
}