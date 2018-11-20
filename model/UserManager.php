<?php
require_once 'Database.php';


class UserManager {

	// CREATE
	public function add(USER $users) {
		$u = Database::getPDO()->prepare('INSERT INTO user(name_admin, password) VALUES (:name_admin, :password)');

		$u->bindValue(':name_admin', $users->nameAdmin(), PDO::PARAM_STR);
		$u->bindValue(':password', $users->password());

		$u->execute();
	}

	// READ
	public function getUsers() {
		$getusers = [];
		$u = Database::getPDO()->query('SELECT * FROM user');

		while ($donnees = $u->fetch(PDO::FETCH_ASSOC)) {
			$getusers[] = new User($donnees);
		}
		return $getusers;
	}

	// UPDATE 
	public function update(User $users) {
		$u = Database::getPDO()->prepare('UPDATE user SET name_admin = :name_admin, password = :password WHERE id = :id');

		$u->bindValue(':name_admin', $users->nameAdmin());
		$u->bindValue('password', $users->password());
		$u->bindValue(':id', $users->id(), PDO::PARAM_INT);

		$u->execute();
	}

	// DELETE
	public function delete(User $users) {
		$u = Database::getPDO()->exec('DELETE FROM user WHERE id =' .$users->id());
	}

}