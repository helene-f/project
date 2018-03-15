<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontOffice/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $totalComments = $comments->rowCount();
    /*$commentManager->countComments();*/

    require('view/frontOffice/postsView.php');
}

function addComment($postId, $author, $comment)
{
  $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception ('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }

    /*function totalComments()
    {

        $commentManager = new CommentManager();

        $totalComments = $commentManager->countComments();



    }*/
}
