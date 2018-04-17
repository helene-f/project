<?php
require('controller/backOffice.php');
require('controller/Admin.php');


		try {
			if (isset($_GET['action'])) {

				/* ----------------
				BACK OFFICE
				-------------------  */

		if ($_GET['action'] == 'getForTable') {
		getForTable();
	}

		elseif ($_GET['action'] == 'postAdmin') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				postAdmin();
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

		elseif($_GET['action'] == 'modifyPost') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['chapterTitle']) && !empty($_POST['chapterContent'])) {
					modifyPost($_GET['id'], $_GET['chapterTitle'], $_GET['chapterContent']);
				}
				else {
					throw new Exception ('Vous n\'avez pas modifié le chapitre.');
				}
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


}
else {
	getForTable();
}
}
catch(Exception $e) {
	$errorMessage = $e->getMessage();
	require('view/frontOffice/error.php');
}
