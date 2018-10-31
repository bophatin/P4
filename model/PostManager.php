<?php
require_once 'Database.php';


class PostManager {

	private $_db;


	public function __construct($db) {
		$this->setDb($db);
	}
	
	// CREATE
	public function add(Post $chap) {
		// Préparation de la requête d'insertion
		$q = $this->_db->prepare('INSERT INTO post(title, date_post, content_post) VALUES(:title, :date_post, :content_post)');

		// Assignation des valeurs pour l'id, le titre, la date, le contenu
		$q->bindValue(':title', $chap->title());
		$q->bindValue(':date_post', $chap->datePost());
		$q->bindValue(':content_post', $chap->contentPost());
		// Exécution de la requête
		$q->execute();
	}

	// READ
	public function get($id) {
		$id = (int) $id;
		// Exécute une requête de type SELECT (avec une clause type WHERE ?)
		$q = $this->_db->query('SELECT id, title, date_post, content_post FROM post WHERE id = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Post($donnees);
	}

	// UPDATE
	public function update(Post $chap) {
		// Prépare une requête de type UPDATE
		$q = $this->_db->prepare('UPDATE post SET title = :title, date_post = :date_post, content_post = :content_post WHERE id = :id');

		// Assignation des valeurs à la requête
		$q->bindValue(':title', $chap->title());
		$q->bindValue(':date_post', $chap->datePost());
		$q->bindValue(':content_post', $chap->contentPost());
		$q->bindValue(':id', $chap->id(), PDO::PARAM_INT);

		// Exécution de la requête
		$q->execute();
	}

	// DELETE
	public function delete(Post $chap) {
		// Prépare une requête de type DELETE
		$q = $this->_db->exec('DELETE FROM post WHERE id = '.$chap->id());
	}

	public function getPost() {
		// Retourne la liste de tous les articles
		$chaps = [];
		$q = $this->_db->getPDO()->query('SELECT * FROM post ORDER BY id DESC');

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
			$chaps[] = new Post($donnees);
		}
		return $chaps;
	}

	public function setDb($db) {
		$this->_db = $db;
	}
}
