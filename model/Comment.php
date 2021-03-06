<?php

class Comment {

	private $_id;
	private $_name;
	private $_date_comment;
	private $_content_comment;
	private $_id_post;
	private $_id_comment;
	private $_signaler;


	public function __construct(array $donnees) {
		if(!empty($donnees)){
	        $this->hydrate($donnees);
	    } else {
	    	var_dump('PB CONSTRUCTEUR COMMENT');
	    }
	}


	public function hydrate(array $donnees) {
		foreach ($donnees as $key => $value) {
			$method = 'set' .ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}


	// LISTE DES GETTERS
	public function id() {
		return $this->_id;
	}

	public function name() {
		return $this->_name;
	}

	public function dateComment() {
		return $this->_date_comment;
	}

	public function contentComment() {
		return $this->_content_comment;
	}

	public function idPost() {
		return $this->_id_post;
	}

	public function idComment() {
		return $this->_id_comment;
	}

	public function signaler() {
		return $this->_signaler;
	}


	// LISTE DES SETTERS
	public function setId($id) {
		$id = (int) $id;
		if ($id > 0) {
			$this->_id = $id;
		}
	}

	public function setName($name) {
		if (is_string($name)) {
			$this->_name = $name;
		}
	}

	public function setDate_comment($dateComment) {
		$dateComment = DateTime::createFromFormat('Y-m-d H:i:s', '2009-02-15 15:16:17');
		$dateComment = $dateComment->format('Y-m-d H:i:s');
		if ($dateComment) {
        	$this->_date_comment = $dateComment;
    	}
	}

	public function setContent_comment($contentComment) {
		if (is_string($contentComment)) {
			$this->_content_comment = $contentComment;
		}
	}

	public function setId_post($idPost) {
		$idPost = (int) $idPost;
		if ($idPost > 0) {
			$this->_id_post = $idPost;
		}
	}

	public function setId_comment($idComment) {
		$idComment = (int) $idComment;
		if ($idComment > 0) {
			$this->_id_comment = $idComment;
		}
	}

	public function setSignaler($signaler) {
		if (is_string($signaler)) {
			$this->_signaler = $signaler;
		}
	}

}