<?php

class User {

	private $_id;
	private $_name_admin;
	private $_password;


	public function __construct(array $donnees) {
		if(!empty($donnees)){
	        $this->hydrate($donnees);
	    } else {
	    	var_dump('PB CONSTRUCTEUR USER');
	    }
	}


	public function hydrate(array $donnees) {
		if (isset($donnees['name_admin'])) {
		    $this->setNameAdmin($donnees['name_admin']);
		}
		
		foreach ($donnees as $key => $value) {
			$method = 'set' .ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}


	// GETTERS
	public function id() {
		return $this->_id;
	}

	public function nameAdmin() {
		return $this->_name_admin;
	}

	public function password() {
		return $this->_password;
	}


	// SETTERS
	public function setId($id) {
		$id = (int) $id;
		if ($id > 0) {
			return $this->_id = $id;
		}
	}

	public function setNameAdmin($nameAdmin) {
		if (is_string($nameAdmin)) {
			return $this->_name_admin = $nameAdmin;
		}
	}

	public function setPassword($password) {
		if (is_string($password)) {
			return $this->_password = $password;
		}
	}
}