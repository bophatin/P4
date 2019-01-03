<?php

abstract class Database {
	
	private static $pdo;

	const DB_HOST = 'host=localhost';
	const DB_NAME = 'dbname=P4';
	const DB_CHARSET = 'charset=utf8';
	const DB_USER = 'root';
	const DB_PASS = 'root';

	public static function getPDO() {
		if(self::$pdo === null) {
			$pdo = new PDO('mysql:' .self::DB_HOST. ';' .self::DB_NAME. ';' .self::DB_CHARSET, self::DB_USER, self::DB_PASS);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
			self::$pdo = $pdo;
		} 
		return self::$pdo;
	} 

} 



