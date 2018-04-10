<?php include ('header.php') ?>

<h1>Modération des commentaires</h1>

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
			<tr>
				<td><?= htmlspecialchars($comment['author']) ?></td>
				<td><?= htmlspecialchars($comment['comment_date_fr']) ?></td>
				<td><?= htmlspecialchars($comment['comment']) ?></td>
				<td>
					<button type="submit" name="commentDeleted">Supprimer</button>
				</td>
