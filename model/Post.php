<?php

class Post {

	private $_id;
	private $_title;
	private $_date_post;
	private $_content_post;


	public function __construct($donnees) {
		if(!empty($donnees)){
        	$this->hydrate($donnees);
    	} else {
    		var_dump('PB CONSTRUCTEUR HYDRATE <br/>');
    	}
	}

	// Hydratation de l'objet en passant des valeurs
	public function hydrate(array $donnees) {
		foreach($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}


	// LISTE DES GETTERS
	public function id() {
		return $this->_id;
	}

	public function title() {
		return $this->_title;
	}

	public function datePost() {
		return $this->_date_post;
	}

	public function contentPost() {
		return $this->_content_post;
	} 


	// LISTE DES SETTERS
	public function setId($id) {
		// On convertit l'argument en nombre entier
		$id = (int) $id;
		// On vérifie que cet id est bien positif
		if ($id > 0) {
			$this->_id = $id;
		}
	}

	public function setTitle($title) {
		// On vérifie qu'il s'agit bien d'une chaîne de caractères
		if (is_string($title)) {
			$this->_title = $title;
		}
	}

	public function setDate_post($datePost) {
    	$datePost = DateTime::createFromFormat('Y-m-d', $datePost);
		$datePost = $datePost->format('Y-m-d');
		if ($datePost) {
        	$this->_date_post = $datePost;
    	}
	}

	public function setContent_post($contentPost) {
		if (is_string($contentPost)) {
			$this->_content_post = $contentPost;
		}
	}

}