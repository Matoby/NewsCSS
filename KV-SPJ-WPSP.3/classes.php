<?php 

class Configuration
{
	public $host = "";
	public $dbName = "";
	public $username = "";
	public $password = "";

	public function __construct($host, $dbName, $username, $password)
	{
		$this->host = $host;
		$this->dbName = $dbName;
		$this->username = $username;
		$this->password = $password;
	}
}

class User
{
	public $user_id = "";
	public $username = "";
	public $password = "";
	public $admin = "";

	public function __construct($user_id, $username, $password, $admin)
	{
		$this->user_id = $user_id;
		$this->username = $username;
		$this->password = $password;
		$this->admin = $admin;
	}
}

class Kategorija
{
	public $kategorija_id = "";
	public $ime = "";

	public function __construct($kategorija_id, $ime)
	{
		$this->kategorija_id = $kategorija_id;
		$this->ime = $ime;
	}
}

class Vijest
{
	public $vijesti_id = "";
	public $naslov = "";
	public $sadrzaj = "";
	public $kategorija = "";
	public $autor = "";

	public function __construct($vijesti_id, $naslov, $sadrzaj, $kategorija, $autor)
	{
		$this->$vijesti_id = $vijesti_id;
		$this->naslov = $naslov;
		$this->sadrzaj = $sadrzaj;
		$this->kategorija = $kategorija;
		$this->autor = $autor;
	}
}

 ?>