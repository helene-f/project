<?php $title = htmlspecialchars($post['title']);
$picture = htmlspecialchars($post['picture']); ?>

<?php ob_start(); ?>
          <p><a class="btn btn-primary" href="index.php" role="button">Retour à la liste des billets</a></p>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
            <h2>
                <?= htmlspecialchars($title) ?>
            </h2>
            <p>
                  <?php ?>
                  <img src="<?= htmlspecialchars($picture) ?>" alt="" />
            </p>
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
</p>
                <p><em>Posté par <a href="view/frontOffice/about.php">Jean Forteroche</a> le <?= $post['creation_date_fr'] ?></em>
            </p>
          </div>
        </div>
      </div>



<div class="container pager">
    <button type="button" class="btn btn-outline-primary">&larr; Chapitre précédent</button>
    <button type="button" class="btn btn-outline-primary">Chapitre suivant &rarr;</button>
</div>

<!-- Card -->
<div class="card">

  <!-- Card title -->
  <div class="card-title">
    <h4 class=" h4 text-center py-4">Donnez votre avis</h4>
  </div>

  <!-- Card body -->
  <div class="card-body">

    <!-- Material form register -->
      <form class="addComment" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">

              <div class="addAuthor form-group row">
                    <label for="author" class="col-sm-3 col-form-label">Pseudo : </label>
                    <input type="text" id="author" name="author" placeholder="Pseudo" class="form-control col-sm-6" />
              </div>


              <div class="addYourOwnComment form-group row">
                    <label for="comment" class="col-sm-3 col-form-label">Commentaire : </label>
                    <textarea id="comment" name="comment" placeholder="Votre commentaire" class="form-control col-sm-6"></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Valider</button>

        </form>
    </div>
  </div>

<div class="container comments-list">
<h4>Commentaires (<?= $totalComments ?>)</h4>

<?php
while ($comment = $comments->fetch())
{
?>
        <div class="commentsPost">
            <p class="commentsAuthor"><strong><?= htmlspecialchars($comment['author']) ?></strong>
            <em class="commentsDate text-muted"> Posté le <?= $comment['comment_date_fr'] ?></em><br/>
            <?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <button class=" signal btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#exampleModalCenter">signaler</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Valider votre signalement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Vous venez de signaler un commentaire auprès de l'administrateur afin qu'il soit modérer. Pouvez-vous nous confirmer ce choix ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Confirmer</button>
                <button type="button" class="btn btn-secondary">Annuler</button>
              </div>
            </div>
          </div>
        </div>



<?php
}

?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
