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
		header('Location: view/backOffice/postsEdit.php?message=Chapitre créé');
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
	$postManager = new PostManager();
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
		header('Location: view/backOffice/postsEdit.php?message=Chapitre modifié');
	}
}


function destroyPost($postId)
{
	$postManager = new PostManager();

	$req = $postManager->deletePost($postId);

	if ($req === false) {
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
		header( "refresh:5; url=index.php" );
		echo ("Le commentaire que vous avez signalé a bien été envoyé à l'administrateur de ce site");
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
		throw new Exception ('Impossible de valider le commentaire !');
	}
	else {
		header('Location: admin.php?action=listComments');
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
		header('Location: admin.php?action=listComment');
	}
}
