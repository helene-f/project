<?php
require_once("model/Manager.php");

class CommentManager extends Manager
{
  public function getComments($postId)
  {
      $db = $this->dbConnect();
      $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
      $comments->execute(array($postId));

      return $comments;
  }

  public function postComment($postId, $author, $comment)
  {
      $db = $this->dbConnect();
      $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
      $affectedLines = $comments->execute(array($postId, $author, $comment));

      return $affectedLines;
  }

  /*public function countComments()
  {
      $db = $this->dbConnect();
      $query = $db->prepare('SELECT COUNT(*) FROM comments');
      $query->execute();
      $count = $query->rowCount();

      return $count;
  }


 public function modifyComment($postId, $author, $comment)
  {
      $db = $this->dbConnect();
      $comments = $db->prepare('UPDATE comments SET comment ='$comment' id ='$postId'');
      /* il faut exécuter la requête
      $affectedLines = $comments->execute();


      return $affectedLines;
  }

  public function deleteComment($postId)
  {
      $id  = $_GET['id'];
      $db = $this->dbConnect();
      $comments = $db->execute('DELETE FROM comments WHERE comments .id ='$id'');
  }
*/
}
