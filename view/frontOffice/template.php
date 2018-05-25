<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Jean Forteroche vous livre son récit d'aventures lorsqu'il a fait le choix de partir vivre en Alaska.">
	<meta name="author" content="Jean Forteroche">

	<title>  <?= $title ?></title>

	<!-- Bootstrap core CSS -->
	<link href="/public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	<!-- Custom styles for this template -->
	<link href="/public/css/clean-blog.min.css" rel="stylesheet">
	<link href="/public/css/style.css" rel="stylesheet">

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="/index.php">Blog</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fa fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="/index.php">Accueil</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chapitres</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">Chapitre 1</a>
							<a class="dropdown-item" href="#">Chapitre 2 </a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title'])?></a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=about">A propos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?action=contact">Contact</a>
					</li>

				</ul>
				<form class="navbar form form-inline searchText" action="search.php" method="post">
					<i id="test" class="fa fa-search" style="color:white;" aria-hidden="true"></i>
					<div id="demo" class="input-group" style="display: none">
						<input class="form-control form-control-sm ml-3 w-60" type="search" placeholder="Recherchez" aria-label="Search" name="q">
						<div class="input-group-append" type="submit">
							<span class="input-group-text">GO</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</nav>


	<!-- Page Header -->
	<header class="masthead" style="background-image: url('public/img/alaska.jpg')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="site-heading">
						<h1>Billet simple pour l'Alaska</h1>
						<span class="subheading">Un roman de Jean Forteroche</span>
					</div>
				</div>
			</div>
		</div>
	</header>


	<!-- Main Content -->
	<div class="container content">
		<?= $content ?>
	</div>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-md-6 mx-auto">

					<ul class="list-inline text-center">

						<h6> Rejoignez-nous : </h6>
						<li class="list-inline-item">
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-github fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
					</ul>
				</div>

				<div class="col-lg-6 col-md-6 mx-auto">

					<ul class="secondary-menu list-inline text-center">
						<h6>Liens utiles</h6>
						<li class="list-inline-item">
							<a href="index.php?action=legal-notices">Mentions légales</a>
						</li>

						<li class="list-inline-item">
							<a href="/view/frontOffice/login.php">Admin</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-4 mx-auto">
					<p class="copyright text-muted">Copyright &copy; All rights reserved. Billet simple pour l'Alaska 2018</p>
				</div>

			</div>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="/public/js/jquery/jquery.min.js"></script>
	<script src="/public/js/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="/public/js/clean-blog.min.js"></script>
	<script src="/public/js/search-button.js"></script>


</body>
</html>
