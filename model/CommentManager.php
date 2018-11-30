<?php
require_once 'Database.php';


class CommentManager {

	// CREATE
	public function add(Comment $comm) {
		$c = Database::getPDO()->prepare('INSERT INTO comment(name, date_comment, content_comment) VALUES (:name, NOW(), :content_comment)');

		$c->bindValue(':name', $comm->name(), PDO::PARAM_STR);
		$c->bindValue(':content_comment', $comm->contentComment());

		$c->execute();
	}
	

	// READ
	public function get($id) {
		$id = (int) $id;

		$c = Database::getPDO()->query('SELECT id, name, email, date_content, content_comment FROM post WHERE id = '.$id);
		$dataComm = $c->fetch(PDO::FETCH_ASSOC);

		return new Comment($dataComm);
	}

	// UPDATE
	public function update(Comment $comm) {
		$c = Database::getPDO()->prepare('UPDATE comment SET name = :name, email = :email, date_comment = :date_comment, content_comment = :content_comment WHERE id = :id');

		$c->bindValue(':name', $comm->name(), PDO::PARAM_STRING);
		$c->bindValue(':date_comment', $comm->dateComment());
		$c->bindValue(':content_comment', $comm->contentComment());

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
		$q = Database::getPDO()->query('SELECT * FROM comment ORDER BY id DESC');

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
			$chaps[] = new Comment($donnees);
		}
		return $chaps;
	}


}