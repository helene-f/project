<?php //TODO $totalPost = SELECT MAX(id) as id_max from posts?>


<div class="page-header">
  <h1><?php //echo $totalPost; ?> chapitres</h1>
  <a href="postsEdit.php">Ajouter</a><br />
</div>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Titre du chapitre</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= htmlspecialchars($data['id']) ?></td>
      <td><?= htmlspecialchars($data['title']) ?></td>
      <td>
        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir</a>
        <a href="#">Modifier</a><br />
        <a onclick="return confirm('Voulez-vous confirmer la suppression de ce chapitre ?'" href="#">Supprimer</a><br />
        <p> brouillon ou publié</p>
      </td>
    </tr>
  </tbody>
</table>


</body>
</html>
