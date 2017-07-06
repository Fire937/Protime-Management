<?php

namespace CoreBundle\DBAL;

/**
 * DataBase Access Layer, donne un accès facilité à la base de donné en appliquant en englobant les fonctionnalités mysqli dans un objet. Cependant, celui-ci reste très simple, ne se contentant que d'ouvrir la connexion au démarrage et de la fermer.
 * 
 */
class DBAL
{
	/**
	 * @var \mysqli La connexion mysqli
	 */
	private $mysqli;

	public function __construct($host, $username, $password, $dbname, $port = null)
	{
		$port = $port? $port:ini_get("mysqli.default_port");

		$this->mysqli = mysqli_connect($host, $username, $password, $dbname, $port);

		if ($this->mysqli->connect_errno){
			// La connexion à échouée
			throw new \RuntimeException("La connexion à la base de donnée a échoué: ".$this->mysqli->connect_error);
		}

		$this->mysqli->set_charset('utf8');
	}

	public function __destruct()
	{
		mysqli_close($this->mysqli);
	}

	/**
	 * @return \mysqli La connexion mysqli
	 */
	public function getMysqli()
	{
		return $this->mysqli;
	}
}