<?php

require_once("model/Manager.php");

class CommentManager extends Manager
{

	// CREATE
	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));

		return $affectedLines;
	}


	// READ
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC");
		$comments->execute(array($postId));

		return $comments;
	}


	public function getComment($commentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr FROM comments WHERE id = ?");
		$req->execute(array($commentId));
		$comment = $req->fetch();

		return $comment;
	}

	// ALERT
	public function postAlert($commentId)
	{
			$db = $this->dbConnect();
			$alertedComments = $db->prepare("UPDATE comments SET comment_signal = NOW() WHERE id = ?");
			$affectedLines = $alertedComments->execute(array($commentId));

			return $affectedLines;
	}


	public function stopAlert($commentId)
	{
			$db = $this->dbConnect();
			$validatedComment = $db->prepare("UPDATE comments SET comment_signal = 0 WHERE id = ?");
			$affectedLines = $validatedComment->execute(array($commentId));

			return $affectedLines;
	}


	public function getCommentsList()
	{
		$db = $this->dbConnect();
		$req = $db->prepare("SELECT * FROM comments WHERE comment_signal != 0 ORDER BY comment_signal DESC");
		$req->execute();

		return $req;
	}

	// DELETE
	function deleteComment($commentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id = ?');
		$req->execute(array($commentId));

		return $req;
	}
}
