<?php
require_once 'Database.php';


class UserManager {


	public function add(USER $users) {
		$u = Database::getPDO()->prepare('INSERT INTO user(name_admin, password) VALUES (:name_admin, :password)');

		$u->bindValue(':name_admin', $users->nameAdmin(), PDO::PARAM_STR);
		$u->bindValue(':password', $users->password());

		$u->execute();
	}


	public function getUsers() {
		$getusers = [];
		$u = Database::getPDO()->query('SELECT * FROM user');

		while ($donnees = $u->fetch(PDO::FETCH_ASSOC)) {
			$getusers[] = new User($donnees);
		}
		return $getusers;
	}


	public function get($id) {
		$u = Database::getPDO()->prepare('SELECT * FROM user WHERE id =' .$id);

		$u->execute(array($id));
		$donnees = $u->fetch(PDO::FETCH_ASSOC);

		return new User($donnees);
	}


	public function update(User $users) {
		$u = Database::getPDO()->prepare('UPDATE user SET name_admin = :name_admin, password = :password WHERE id = :id LIMIT 1');

		$u->bindValue(':name_admin', $users->nameAdmin());
		$u->bindValue('password', $users->password());

		$u->execute();
	}


	public function delete(User $users) {
		$u = Database::getPDO()->prepare('DELETE FROM user WHERE id =' .$users->id());

		$u->bindValue(':id', $users->id());
		$u->bindValue(':name_admin', $users->nameAdmin());
		$u->bindValue(':password', $users->password());

		$u->execute();
	}

}