<?php
require_once 'Database.php';


class CommentManager {

	// CREATE
	public function add($name_form, $comment_form) {
		$c = Database::getPDO()->prepare('INSERT INTO comment(name, date_comment, content_comment) VALUES(?, NOW(), ?)');
		$c->execute(array($name_form, $comment_form));
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
		$c->bindValue(':email', $comm->email());
		$c->bindValue(':date_comment', $comm->dateComment());
		$c->bindValue(':content_comment', $comm->contentComment());

		$q->execute();
	}

	// DELETE
	public function delete(Comment $comm) {
		$c = Database::getPDO()->exec('DELETE FROM comment WHERE id = '.$comm->id());
	}

	public function getComments() {
		$comm = [];
		$c = Database::getPDO()->query('SELECT id, name, email, date_comment, content_comment, FROM comment');

		while ($dataComm = $c->fetch(PDO::FECTH_ASSOC)) {
			$comm[] = new Post($dataComm);
		}
		return $comm;
	}

}