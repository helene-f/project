<?php

//use \OpenClassrooms\Blog\Model\PostManager;
//use \OpenClassrooms\Blog\Model\CommentManager;
//use \OpenClassrooms\Blog\Model\ContactManager;

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


/*function searchNav($q)
{
	// on rend clean la requete de l'utilisateur
	$q = preg_replace("#[^a-zA-Z ?0-9]#i", "", $_POST['q']);
	// cette fonction prend en premier paramètre un pattern, i est sensible a la casse, replacer par une chaine vide - remplacer par une chaine vide, il faut faire la recherche au niveau de post query - tout ce qui n'est pas une lettre de a a z en minuscule. Permet de rendre clean ce que l'utilisateur a envoyé

	$postManager = new PostManager();
	$req = $postManager->searchWord($q);
	$count = $req->rowCount();

	require('view/frontOffice/search.php');

	if($count >= 1) {
		echo "<hr/> $count résultat(s) trouvé(s) pour <strong>$q</strong><hr/>";
	}
	else {
		echo "<hr/> O résultat trouvé pour <strong>$q</strong><hr/>";
	}
}*/
