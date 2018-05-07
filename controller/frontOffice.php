<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ContactManager.php');


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
}


function addContact($contactName, $contactEmail)
{

	$contactManager = new ContactManager();

	$testLines = $contactManager->postContact($contactName, $contactEmail);

	if ($testLines === false) {
		throw new Exception ('Impossible d\'ajouter vos coordonnées !');
	}
	else {
		header( "refresh:5; url=index.php" );
		echo ("vous êtes inscrit à la newsletter");
	}
}
