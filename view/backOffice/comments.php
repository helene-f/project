<?php include ('header.php');
var_dump($alertCommentsTotal);
var_dump($req); ?>

<h1>Modération des commentaires signalés (<?= $alertCommentsTotal ?>)</h1>

<table class="table-bordered">
	<thead>
		<tr>
			<th scope="col">Auteur</th>
			<th scope="col">Date d'ajout</th>
			<th scope="col">Commentaire</th>
			<th scope="col">Demande de suppression</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($rowAll as $row){
			?>
			<tr>
				<td><?php print_r($row['author']); ?></td>
				<td><?php print_r($row['comment_date']); ?></td>
				<td><?php print_r($row['comment']); ?></td>
				<td>
					<a class="btn btn-success" name="commentValidated" onclick="return confirm('Voulez-vous remettre ce commentaire en ligne ?')" href="/admin.php?action=validateComment&amp;id=<?php print_r($row['id']);?>">Valider</a>
					<a class="btn btn-danger" name="commentDeleted" onclick="return confirm('Voulez-vous supprimer définitivement ce commentaire ?')" href="/admin.php?action=destroyComment&amp;id=<?php print_r($row['id']);?>&amp;post_id=<?php print_r($row['post_id']); ?>">Supprimer</a>
				</td>
			</tr>
				<?php
				}
				?>

			</tbody>
		</table>
		<!-- Bootstrap core JavaScript -->
		<script src="/public/js/jquery/jquery.min.js"></script>
		<script src="/public/js/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Custom scripts for this template -->
		<script src="/public/js/clean-blog.min.js"></script>

		</body>
		</html>
