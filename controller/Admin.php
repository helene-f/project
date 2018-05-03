<?php

require_once('model/ConnexionManager.php');

function register($adminName, $adminEmail, $psw_hache)
{
	$adminName = htmlspecialchars($_POST['adminName']);
	$adminEmail = htmlspecialchars($_POST['email']);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$psw_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

	if ($password == $password2) {
		$connexionManager = new ConnexionManager();
		$addedAdmin = $connexionManager->addAdmin($adminName, $adminEmail, $psw_hache);

		if ($addedAdmin === false) {
			throw new Exception ('Impossible d\'ajouter un autre administrateur !');
		}
		else {
			echo ("vous avez désormais un autre administrateur du site");
		}
	}
	else {
		throw new Exception ("les mots de passe sont différents. Réessayez !");
	}
}


function login()
{
	$connexionManager = new ConnexionManager();
	$logResult = $connexionManager->log();

	//We try to compare password sent accross the form with the database password
	$isPasswordCorrect = password_verify($_POST['password'], $logResult['password']);

	if ($isPasswordCorrect)
	{

		if ($logResult['active'] == 1) {
			session_start();
			$_SESSION['id'] = $logResult['id'];
			$_SESSION['admin'] = $_POST['adminName'];

			header("Location:/view/backOffice/dashboard.php");
			exit;
		}
		else {
			//Le compte est inactif

			//Redirection
			header("location: /view/frontOffice/login.php?message=Mauvais identifiant ou mot de passe !");
			exit;
		}
	}

	else{

		//Redirection
		header("location: /view/frontOffice/login.php?message=Mauvais identifiant ou mot de passe !");
		exit;
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
	setcookie('psw_hache', '');

	header("Location:/index.php");
}
