<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// CREATE
function addPost($title, $content)
{
	$postManager = new PostManager();
	$postEdit = $postManager->createPost($title, $content);

	if ($postEdit === false) {
		throw new Exception ('Impossible d\'ajouter le chapitre !');
	}
	else {
		echo "ca fonctionne : un chapitre en plus";
	}
}


function listPostsAdmin()
{
	$postManager = new PostManager();// Création d'un objet
	$posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

	require('view/backOffice/listPostsEdit.php');
}


function getForTable()
{
	$postManager = new PostManager();// Création d'un objet
	$req = $postManager->getPostsList();
	$postsTotal = $req->rowcount();
	$rowAll = $req->fetchAll();

	require('view/backOffice/listPostsEdit.php');
}


function postAdmin()
{
	$postManager = new PostManager();

	$post = $postManager->getPost($_GET['id']);

	require('view/backOffice/postsEdit.php');
}


function modifyPost($newTitle, $newContent, $postId)
{
	$postManager = new PostManager();

	$affectedLines = $postManager->updatePost($newTitle, $newContent, $postId);

	if ($affectedLines == false) {
		throw new Exception('Impossible de modifier le chapitre !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}


function destroyPost($postId)
{
	$postManager = new PostManager();

	$req = $postManager->deletePost($postId);

	if ($req=== false) {
		throw new Exception ('Impossible de supprimer le chapitre !');
	}
	else {
		header('Location: admin.php?action=getForTable');
	}
}


function addCommentAlert($commentId)
{
	$commentManager = new CommentManager();

	$affectedLines = $commentManager->postAlert($commentId);

	if ($affectedLines === false) {
		throw new Exception ('Impossible de signaler le commentaire !');
	}
	else {
		echo "ca fonctionne : un commentaire signalé";
	}
}


function listComments()
{
	$commentManager = new CommentManager();

	$req = $commentManager->getCommentsList();
	$alertCommentsTotal = $req->rowcount();
	$rowAll = $req->fetchAll();

	require('view/backOffice/comments.php');
}


function validateComment($commentId)
{
	$commentManager = new CommentManager();

	$affectedLines = $commentManager->stopAlert($commentId);

	if ($affectedLines === false) {
		throw new Exception ('Impossible de remettre en ligne le commentaire !');
	}
	else {
		echo "ca fonctionne : un commentaire remis en ligne";
	}
}


function destroyComment($commentId)
{
	$commentManager = new CommentManager();

	$req = $commentManager->deleteComment($commentId);

	if ($req=== false) {
		throw new Exception ('Impossible de supprimer le commentaire signalé par un lecteur visiteur !');
	}
	else {
		echo "ca fonctionne";
	}
}
