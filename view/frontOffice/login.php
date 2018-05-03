<?php
// we want to redirect the administrator to the listPostsEdit page if he is already logged in
session_start();
if (isset($_SESSION['admin'])) header("Location:/view/backOffice/dashboard.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Jean Forteroche vous livre son récit d'aventures lorsqu'il a fait le choix de partir vivre en Alaska.">
	<meta name="author" content="Jean Forteroche">

	<title>Connexion</title>

	<!-- Bootstrap core CSS -->
	<link href="public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	<!-- Custom styles for this template -->

	<link href="/public/css/login-style.css" rel="stylesheet">
	<link href="/public/css/clean-blog.min.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="card card-container">
			<h2 class="card-header">Connexion à votre espace</h2>
			<div class="card-body">
				<?php if(isset($_GET['message']))
				{
					$message = $_GET['message']; ?>
					<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
						<?php echo $message; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
				}
				?>
				<h5 class="card-title">Identifiez-vous</h5>
				<div class="card-text login-form">
					<form class="connexionPlace" action="/index.php?action=login" method="post">
						<div class="form-group">
							<label for="pseudo">Pseudo :</label>
							<input name="adminName" type="text" id="adminName" class="form-control" required value="<?php if(isset($adminname)) {echo $adminname;} ?>"/>
						</div>

						<div class="form-group">
							<label for="password">Mot de Passe :</label>
							<input type="password"  name="password" id="password" class="form-control" required/>
						</div>
						<div class="form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox" name="AutomaticConnexion" value="Connexion automatique">
								<label class="form-check-label" for="inlineCheckbox">Connexion Automatique</label>
							</div>
						</div>


						<input type="submit" name"formConnect" class="btn btn-primary" value="Connexion" />
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Bootstrap core JavaScript -->
	<script src="/public/js/jquery/jquery.min.js"></script>
	<script src="/public/js/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="/public/js/clean-blog.min.js"></script>
	<script src="/public/js/search-button.js"></script>

</body>
</html>
