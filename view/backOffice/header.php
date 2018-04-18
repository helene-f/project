 <?php $title = 'Admin'; ?>

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
            <a class="navbar-brand" href="/index.php">Admin</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin.php?action=getForTable">Liste des chapitres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/view/backOffice/postsEdit.php">Ajouter un chapitre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin.php?action=listComments">Commentaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="/view/backOffice/logout.php">Déconnexion</a>
                    </li>
                </ul>
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
