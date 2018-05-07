<?php

require_once("model/Manager.php");

class PostManager extends Manager
{
	/* -----
	CRUD
	----- */

	// CREATE
	public function createPost($title, $content)
	{
		$db = $this->dbConnect();
		$posts = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
		$affectedLines = $posts->execute(array($title, $content));

		return $affectedLines;
	}


	// READ
	public function getPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT 0, 5");

		return $req;
	}


	public function getPostsList()
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM posts');
		$req->execute();

		return $req;
	}


	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM posts WHERE id = ?");
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	// UPDATE
	function updatePost($newTitle, $newContent, $postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
		$affectedLines = $req->execute(array($newTitle, $newContent, $postId));

		return $affectedLines;
	}

	// DELETE
	public function deletePost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("DELETE p, c FROM posts p LEFT JOIN comments c ON c.post_id = p.id WHERE p.id= ?");
		$req->execute(array($postId));

		return $req;
	}
}
