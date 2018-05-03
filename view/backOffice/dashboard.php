<?php
session_start();

if (empty($_SESSION['id']))
{
		header("Location:/view/frontOffice/login.php");
}

include ('header.php'); ?>

<div class="container">
	<h2>
		<?php if (isset($_SESSION['id']) AND isset($_SESSION['admin']))
		{
			echo 'Bonjour ' . $_SESSION['admin'];
		}
		?>
	</h2>

	<p><strong>Que souhaitez-vous faire ?</strong></p>

	<div class="btn-group" role="group" aria-label="dashboard">
		<a role="button" class="btn btn-primary" href="/view/backOffice/postsEdit.php" aria-disabled="true">Ajouter un chapitre</a>
		<a role="button" class="btn btn-secondary" href="/admin.php?action=getForTable" aria-disabled="true">Gérer vos chapitres</a>
		<a role="button" class="btn btn-warning" href="/admin.php?action=listComments" aria-disabled="true">Gérer vos commentaires</a>
		<a role="button" class="btn btn-warning" href="/view/backOffice/register.php" aria-disabled="true">Ajouter un nouvel administrateur</a>
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
