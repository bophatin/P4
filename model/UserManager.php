<?php
require_once 'Database.php';


class UserManager {

	// CREATE
	public function add(USER $users) {
		$u = Database::getPDO()->prepare('INSERT INTO user(name_admin, password) VALUES (:name_admin, :password)');

		$u->bindValue(':name_admin', $users->setNameAdmin());
		$u->bindValue('password', $users->setPassword());

		$u->execute();
	}

	// READ
	public function get($id) {
		$id = (int) $id;

		$u = Database::getPDO()->query('SELECT id, name_admin, password FROM user WHERE id = '.$id);
		$donnees = $u->fetch(PDO::FETCH_ASSOC);
		return new User($donnees);
	}

	// UPDATE 
	public function update(User $users) {
		$u = Database::getPDO()->prepare('UPDATE user SET name_admin = :name_admin, password = :password WHERE id = :id');

		$u->bindValue(':name_admin', $users->setNameAdmin());
		$u->bindValue('password', $users->setPassword());
		$u->bindValue(':id', $users->id(), PDO::PARAM_INT);

		$u->execute();
	}

	// DELETE
	public function delete(User $users) {
		$u = Database::getPDO()->exec('DELETE FROM user WHERE id = '.$users->id());
	}


}