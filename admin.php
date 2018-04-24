<?php
require('controller/backOffice.php');
require('controller/Admin.php');

/* ----------------
BACK OFFICE
-------------------  */

try {
	if (isset($_GET['action'])) {


		if ($_GET['action'] == 'getForTable') {
			getForTable();
		}


		elseif ($_GET['action'] == 'postAdmin') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				postAdmin($_GET['id']);
			}
			else {
				throw new Exception('Aucun identifiant de chapitre');
			}
		}


		elseif ($_GET['action'] == 'addPost') {
			if (!empty($_POST['chapterTitle']) && !empty($_POST['chapterContent'])) {
				addPost($_POST['chapterTitle'], $_POST['chapterContent']);
			}
			else {
				throw new Exception ('tous les champs ne sont pas remplis !');
			}
		}


		elseif ($_GET['action'] == 'modifyPost') {
			if (!empty($_POST['chapterTitle']) && !empty($_POST['chapterContent'])) {
				modifyPost($_POST['chapterTitle'], $_POST['chapterContent'], $_GET['id']);
			}
			else {
				throw new Exception ('Vous n\'avez pas modifié le chapitre.');
			}
		}


		elseif ($_GET['action'] == 'destroyPost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				destroyPost($_GET['id']);
			}
			else {
				throw new Exception ('Impossible de supprimer ce chapitre !');
			}
		}


		elseif ($_GET['action'] == 'addCommentAlert') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				addCommentAlert($_GET['id']);
			}
			else {
				throw new Exception ('Aucun identifiant de commentaire');
			}
		}


		elseif ($_GET['action'] == 'listComments') {
			listComments();
		}


		elseif ($_GET['action'] == 'validateComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				validateComment($_GET['id']);
			}
			else {
				throw new Exception ('Aucun identifiant de commentaire');
			}
		}


		elseif ($_GET['action'] == 'destroyComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				destroyComment($_GET['id']);
			}
			else {
				throw new Exception ('Aucun identifiant de commentaire');
			}
		}

	}
	else {
		getForTable();
	}
}
catch(Exception $e) {
	$errorMessage = $e->getMessage();
	require('view/frontOffice/error.php');
}
