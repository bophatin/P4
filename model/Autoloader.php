<?php

class Autoloader {

	static function register() {
		spl_autoload_register(array(__CLASS__, 'autoload'));
		/*echo "ok function registrer marche <br/>";*/
	}

	static function autoload($class_name) {
		require 'model/' . $class_name . '.php';
		/*echo "ok function autoload marche <br/>"; */
	}

}


