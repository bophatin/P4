<?php
require_once 'Database.php';


class PostManager {


	// CREATE
	public function add(Post $chap) {
		$q = Database::getPDO()->prepare('INSERT INTO post(title, date_post, content_post) VALUES(:title, NOW(), :content_post)'); 

		$q->bindValue(':title', $chap->title());
		$q->bindValue(':content_post', $chap->contentPost());

		$q->execute();
	}


	// READ
	public function get($id) {
		$q = Database::getPDO()->prepare('SELECT * FROM post WHERE id =' .$id);

		$q->execute(array($id));
		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Post($donnees);
	}


	// UPDATE
	public function update(Post $chap) {
		$q = Database::getPDO()->prepare('UPDATE post SET title = :title, content_post = :content_post WHERE id = :id');

		$q->bindValue(':title', $chap->title());
		$q->bindValue(':content_post', $chap->contentPost());
		$q->bindValue(':id', $chap->id());

		$q->execute();
	}


	// DELETE
	public function delete(Post $chap) {
		$q = Database::getPDO()->prepare('DELETE FROM post WHERE id =' .$chap->id());

		$q->bindValue(':id', $chap->id());
		$q->bindValue(':title', $chap->title());
		$q->bindValue(':content_post', $chap->contentPost());

		$q->execute();
	}


	public function getPost() {
		$chaps = [];
		$q = Database::getPDO()->query('SELECT * FROM post ORDER BY id DESC');

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
			$chaps[] = new Post($donnees);
		}
		return $chaps;
	}

}
