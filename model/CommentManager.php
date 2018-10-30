<?php

class CommentManager {

	private $_db;


	public function __construct($db) {
		$this->setDb($db);
	}


	// CREATE
	public function add(Comment $comm) {
		$c = $this->_db->prepare('INSERT INTO comment(name, email, date_comment, content_comment) VALUES(:name, :email, :date_comment, :content_comment)');

		$c->bindValue(':name', $comm->name(), PDO::PARAM_STRING);
		$c->bindValue(':email', $comm->email());
		$c->bindValue(':date_comment', $comm->dateComment());
		$c->bindValue(':content_comment', $comm->contentComment());

		$c->execute();
	}

	// READ
	public function get($id) {
		$id = (int) $id;

		$c = $this->_db->query('SELECT id, name, email, date_content, content_comment FROM post WHERE id = '.$id);
		$dataComm = $c->fetch(PDO::FETCH_ASSOC);

		return new Comment($dataComm);
	}

	// UPDATE
	public function update(Comment $comm) {
		$c = $this->_db->prepare('UPDATE comment SET name = :name, email = :email, date_comment = :date_comment, content_comment = :content_comment WHERE id = :id');

		$c->bindValue(':name', $comm->name(), PDO::PARAM_STRING);
		$c->bindValue(':email', $comm->email());
		$c->bindValue(':date_comment', $comm->dateComment());
		$c->bindValue(':content_comment', $comm->contentComment());

		$q->execute();
	}

	// DELETE
	public function delete(Comment $comm) {
		$c = $this->_db->exec('DELETE FROM comment WHERE id = '.$comm->id());
	}

	public function getComments() {
		$comm = [];
		$c = $this->_db->query('SELECT id, name, email, date_comment, content_comment, FROM comment');

		while ($dataComm = $c->fetch(PDO::FECTH_ASSOC)) {
			$comm[] = new Post($dataComm);
		}
		return $comm;
	}

	public function setDb(PDO $db) {
		$this->_db = $db;
	}

}