<?php
require('controller/frontOffice.php');
require('controller/Admin.php');


/* ----------------
   FRONT OFFICE
-------------------  */

try {
	if (isset($_GET['action'])) {

		if ($_GET['action'] == 'listPosts') {
			listPosts();
		}


		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			}
			else {
				// Erreur ! On arrête tout, on envoie un exception, donc on saute directement au catch
				throw new Exception ('Aucun identifiant de billet envoyé');
			}
		}


		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['author']) && !empty($_POST['comment'])) {
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else {
					throw new Exception ('tous les champs ne sont pas remplis !');
				}
			}
			else {
				throw new Exception ('aucun identifiant de billet envoyé');
			}
		}


		elseif ($_GET['action'] == 'addContact') {
			//if (isset($_GET['contactId']) && $_GET['contactId'] > 0) {
			if (!empty($_POST['contactName']) && !empty($_POST['contactEmail'])) {
				addContact($_POST['contactName'], $_POST['contactEmail']);
			}
			else {
				throw new Exception ('tous les champs ne sont pas remplis !');
			}
		}


		elseif ($_GET['action'] == 'register') {
			if (!empty($_POST['adminName']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
				register($_POST['adminName'], $_POST['email'], $_POST['password']);
			}
			else {
				throw new Exception ('tous les champs ne sont pas remplis !');
			}
		}


		elseif ($_GET['action'] == 'login') {
			if (!empty($_POST['adminName']) && !empty($_POST['password'])) {
				login();
				if (isset($POST['AutomaticConnexion'])) {
					echo "connexion automatique";
					setcookie('login', ($_POST['adminName']), time()+3600);
					setcookie('psw_hache', ($_POST['password']), time()+3600);
				}
				else {
					echo 'cela ne marche pas, pas de possibilité de créer des cookies';
				}
			}
			else {
				throw new Exception ('tous les champs ne sont pas remplis !');
			}
		}


		elseif ($_GET['action'] == 'logout') {
			logout();
		}


		/*
		elseif ($_GET['action'] == 'searchNav') {
		if(isset($_POST['q']) && !empty($_POST['q'])) {
		searchNav($_POST['q']);
	}
	else {
	// Erreur ! On arrête tout, on envoie un exception, donc on saute directement au catch
	throw new Exception ('Aucune recherche n\'a été effectuée');
}
}
*/


}
else {
	listPosts();
}
}
catch(Exception $e) {
	$errorMessage = $e->getMessage();
	require('view/frontOffice/error.php');
}
