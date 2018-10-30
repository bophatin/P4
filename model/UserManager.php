<?php

class UserManager {

	private $_db;


	public function __construct($db) {
		$this->setDb($db);
	}

	// CREATE
	public function add(USER $users) {
		$u = $this->_db->prepare('INSERT INTO user(name_admin, password) VALUES (:name_admin, :password)');

		$u->bindValue(':name_admin', $users->setNameAdmin());
		$u->bindValue('password', $users->setPassword());

		$u->execute();
	}

	// READ
	public function get($id) {
		$id = (int) $id;

		$u = $this->_db->query('SELECT id, name_admin, password FROM user WHERE id = '.$id);
		$donnees = $u->fetch(PDO::FETCH_ASSOC);
		return new User($donnees);
	}

	// UPDATE 
	public function update(User $users) {
		$u = $this->_db->prepare('UPDATE user SET name_admin = :name_admin, password = :password WHERE id = :id');

		$u->bindValue(':name_admin', $users->setNameAdmin());
		$u->bindValue('password', $users->setPassword());
		$u->bindValue(':id', $users->id(), PDO::PARAM_INT);

		$u->execute();
	}

	// DELETE
	public function delete(User $users) {
		$u = $this->_db->exec('DELETE FROM user WHERE id = '.$users->id());
	}


	public function setDb(USER $db) {
		$this->_db = $db;
	}

}