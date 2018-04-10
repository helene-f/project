<?php
//use \OpenClassrooms\Blog\Model\ConnexionManager;
require_once('model/ConnexionManager.php');

	function register($adminName, $adminEmail, $password)
	{
		$connexionManager = new ConnexionManager();

		$addedAdmin = $contactManager->addAdmin($adminName, $adminEmail, $password);

		if ($addedAdmin === false) {
			throw new Exception ('Impossible d\'ajouter un autre administrateur !');
		}
		else {
			echo ("vous êtes désormais administrateur du site");
		}
	}


	function login()
	{

		$connexionManager = new ConnexionManager();
		$logResult = $connexionManager->log();


		//We try to compare password sent accross the form with the database password
		$isPasswordCorrect = password_verify($_POST['password'], $logResult['password']);

		if (!$logResult)
		{
			echo ('Mauvais identifiant ou mot de passe. Réessayez !');
		}
		else {
			if ($isPasswordCorrect) {
				session_start();
				$_SESSION['id'] = $logResult['id'];
				$_SESSION['admin'] = $_POST['adminName'];
				echo 'Bonjour '.htmlspecialchars($_SESSION['admin']).', vous êtes connecté';
				header("Location:/view/backOffice/listPostsEdit.php");
			}
			else {
				echo ('Mauvais identifiant ou mot de passe !');
				echo password_hash("test", PASSWORD_DEFAULT);
				var_dump($logResult);

				var_dump($isPasswordCorrect);

				var_dump($_POST['password']);
				var_dump($logResult['password']);

				var_dump($_SESSION['id']);
				var_dump($_SESSION['admin']);
				var_dump($_POST['adminName']);
				var_dump($logResult['id']);

			}
		}

	}

	function logout()
	{
		// does logout procedures
		session_start();

		// Delete session
		$_SESSION = array();
		session_destroy();


		// Delete cookies from the automatic connexion
		setcookie('login', '');
		setcookie('pass_hache', '');

		header('Location: index.php');
		exit();
	}