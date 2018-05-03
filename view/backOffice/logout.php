<?php
session_start();

if (empty($_SESSION['id']))
{
		header("Location:/view/frontOffice/login.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Jean Forteroche vous livre son récit d'aventures lorsqu'il a fait le choix de partir vivre en Alaska.">
	<meta name="author" content="Jean Forteroche">

	<title>Page de déconnexion</title>

	<!-- Bootstrap core CSS -->
	<link href="/public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" ty
	pe="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	<!-- Custom styles for this template -->

	<link href="/public/css/login-style.css" rel="stylesheet">
	<link href="/public/css/clean-blog.min.css" rel="stylesheet">

</head>
<body>
	<div class="container deconnexion">
		<div class="card card-container">
			<h2 class="card-header">Déconnexion</h2>
			<div class="card-body">
				<h5 class="card-title">Etes-vous sur de vouloir vous déconnecter ?</h5>
				<div class="card-text">
					<button class="btn btn-primary" name="logout"><a href="/index.php?action=logout">Oui, je me déconnecte</a></button>
					<button class="btn btn-warning" name="stayLogin"><a href="/view/backOffice/listPostsEdit.php">Non, je reste connecté</a></button>
				</div>
			</div>
		</div>
	</div>


	<!-- Bootstrap core JavaScript -->
	<script src="/public/js/jquery/jquery.min.js"></script>
	<script src="/public/js/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="/public/js/clean-blog.min.js"></script>


</body>
</html>
