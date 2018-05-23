<?php
session_start();

if (empty($_SESSION['id']))
{
		header("Location:/view/frontOffice/login.php");
}

include ('header.php');
?>



<div class= "container">

	<div class="page-title">
<h1>Modération des commentaires signalés (<?= $alertCommentsTotal ?>)</h1>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th scope="col">Auteur</th>
			<th scope="col">Date d'ajout</th>
			<th scope="col">Commentaire</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($rowAll as $row){
			?>
			<tr>
				<td><?php echo htmlspecialchars(print_r($row['author'])); ?></td>
				<td><?php echo htmlspecialchars(print_r($row['comment_date'])); ?></td>
				<td><?php echo htmlspecialchars(print_r($row['comment'])); ?></td>
				<td>
					<a class="btn btn-success" name="commentValidated" onclick="return confirm('Voulez-vous vraiment valider ce commentaire et le retrouver sur le blog ?')" href="/admin.php?action=validateComment&amp;id=<?php print_r($row['id']);?>">Valider</a>
					<a class="btn btn-danger" name="commentDeleted" onclick="return confirm('Voulez-vous supprimer définitivement ce commentaire ?')" href="/admin.php?action=destroyComment&amp;id=<?php print_r($row['id']);?>&amp;post_id=<?php print_r($row['post_id']); ?>">Supprimer</a>
				</td>
			</tr>

				<?php
				}
				?>

			</tbody>
		</table>
	</div>

		<!-- Bootstrap core JavaScript -->
		<script src="/public/js/jquery/jquery.min.js"></script>
		<script src="/public/js/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Custom scripts for this template -->
		<script src="/public/js/clean-blog.min.js"></script>
		<script src="/public/js/search-button.js"></script>

		</body>
		</html>
