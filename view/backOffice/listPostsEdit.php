<?php include ('header.php'); ?>

<div class="container">

	<div class="page-title">
		<h1>Tableau de bord</h1>
		<p><a class="btn btn-primary" href="/view/backOffice/postsEdit.php">Ajouter un chapitre</a></p>
		<p style="text-align: center">Il y a actuellement <?= $postsTotal ?> chapitres. En voici la liste :</p>
	</div>

	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Titre</th>
			<th>Date d'ajout</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($rowAll as $row){
			?>
			<tr>
				<td><?php print_r($row['id']); ?></td>
				<td><?php print_r($row['title']); ?></td>
				<td><?php print_r($row['creation_date']); ?></td>
				<td>
					<a class="btn btn-primary" href="/index.php?action=post&amp;id=<?php print_r($row['id']); ?>">Voir</a>
					<a class="btn btn-success" href="/admin.php?action=postAdmin&amp;id=<?php print_r($row['id']); ?>">Modifier</a>
					<a class="btn btn-danger" onclick="return confirm('Voulez-vous confirmer la suppression de ce chapitre ?')" href="/admin.php?action=destroyPost&amp;id=<?php print_r($row['id']); ?>">Supprimer</a>
				</td>
			</tr>
		<?php }
		?>
	</table>
</div>

<!-- Pagination -->
<nav aria-label="Page navigation example">
	<ul class="pagination justify-content-center">
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				<span class="sr-only">Précédent</span>
			</a>
		</li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				<span class="sr-only">Suivant</span>
			</a>
		</li>
	</ul>
</nav>
<!-- Pagination -->

<!-- Bootstrap core JavaScript -->
<script src="/public/js/jquery/jquery.min.js"></script>
<script src="/public/js/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="/public/js/clean-blog.min.js"></script>
<script src="/public/js/search-button.js"></script>

</body>
</html>
