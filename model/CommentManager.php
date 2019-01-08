<?php
require_once 'Database.php';


class CommentManager {

	// CREATE
	public function add(Comment $comm) {
		$c = Database::getPDO()->prepare('INSERT INTO comment(name, date_comment, content_comment, id_post) VALUES (:name, NOW(), :content_comment, :id_post)');

		$c->bindValue(':name', $comm->name(), PDO::PARAM_STR);
		$c->bindValue(':content_comment', $comm->contentComment());
		$c->bindValue(':id_post', $comm->idPost());

		$c->execute();
	}
	

	// READ
	public function get($idPost) {
		$comms = [];
		$c = Database::getPDO()->query('SELECT * FROM comment WHERE id_post =' .$idPost);

		while ($donnees = $c->fetch(PDO::FETCH_ASSOC)) {
			$comms[] = new Comment($donnees);
		}
		return $comms;
	}

	// UPDATE
	public function update(Comment $comm) {
		$c = Database::getPDO()->prepare('UPDATE comment SET name = :name, email = :email, date_comment = :date_comment, content_comment = :content_comment WHERE id = :id');

		$c->bindValue(':name', $comm->name(), PDO::PARAM_STRING);
		$c->bindValue(':date_comment', $comm->dateComment());
		$c->bindValue(':content_comment', $comm->contentComment());

		$c->execute();
	}

	public function upSignaler(Comment $comm) {
		$c = Database::getPDO()->prepare('UPDATE comment SET signaler = :signaler WHERE id = :id');

		$c->bindValue(':signaler', $comm->signaler());
		$c->bindValue(':id', $comm->id());
		
		$c->execute();
	}


	// DELETE
	public function delete(Comment $comm) {
		$c = Database::getPDO()->prepare('DELETE FROM comment WHERE id =' .$comm->id());

		$c->bindValue(':id', $comm->id());
		$c->bindValue(':name', $comm->name());
		$c->bindValue(':content_comment', $comm->contentComment());

		$c->execute();
	}

	public function getComments() {
		$chaps = [];
		$c = Database::getPDO()->query('SELECT * FROM comment ORDER BY id DESC');

		while ($donnees = $c->fetch(PDO::FETCH_ASSOC)) {
			$chaps[] = new Comment($donnees);
		}
		return $chaps;
	}

	public function getIdComm($id) {
		$comms = [];
		$c = Database::getPDO()->query('SELECT * FROM comment WHERE id =' .$id);

		while ($donnees = $c->fetch(PDO::FETCH_ASSOC)) {
			$comms[] = new Comment($donnees);
		}
		return $comms;
	}

}