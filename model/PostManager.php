<?php
require_once("model/Manager.php");

class PostManager extends Manager
{
  public function getPosts()
  {
      $db = $this->dbConnect();
      $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, picture FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

      return $req;
  }

  public function getPost($postId)
  {
      $db = $this->dbConnect();
      $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, picture FROM posts WHERE id = ?');
      $req->execute(array($postId));
      $post = $req->fetch();

      return $post;
  }

  public function editPost($id, $title, $content, $author, $picture)
  {
      $db = $this->dbConnect();
      $posts = $db->prepare('INSERT INTO posts (id, title, content, author, creation_date, picture) VALUES(?, ?, ?, ?, NOW(), ?)');
      $affectedLines = $posts->execute(array($id, $picture, $title, $content, $author, $picture));

      return $affectedLines;
  }
}
