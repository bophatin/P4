<?php

abstract class Database {

	/*
	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;*/
	
	private static $pdo;

	const DB_HOST = 'host=localhost';
	const DB_NAME = 'dbname=P4';
	const DB_CHARSET = 'charset=utf8';
	const DB_USER = 'root';
	const DB_PASS = 'root';

	/*
	public function __construct($db_name, $db_user= 'root', $db_pass ='root', $db_host ='localhost') {
		$this->$db_name = $db_name;
		$this->$db_user = $db_user;
		$this->$db_pass = $db_pass;
		$this->$db_host = $db_host;
	}
	*/

	public static function getPDO() {
		if(self::$pdo === null) {
			$pdo = new PDO('mysql:' .self::DB_HOST. ';' .self::DB_NAME. ';' .self::DB_CHARSET, self::DB_USER, self::DB_PASS);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
			self::$pdo = $pdo;
		} 
		return self::$pdo;
	} 

	
	/*public static function query($statement) {
		$req = self::$pdo->query($statement);
		$data = $req->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}*/

} 



