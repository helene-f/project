<?php $title = htmlspecialchars($post['title']);
$picture = htmlspecialchars($post['picture']); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska !</h1>
<div class="container">
  <p><a href="index.php">Retour à la liste des billets</a></p>
  <div class="news">
        <h3>
            <?= htmlspecialchars($title) ?>
        </h3>
        <p>
              <?php ?>
              <img src="<?= htmlspecialchars($picture) ?>" alt="" />
        </p>
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
            <br />
            <em>le <?= $post['creation_date_fr'] ?></em>
        </p>
  </div>
</div>

<div class="container">
        <h4>Commentaires</h4>
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
          <div>
              <label for="author">Pseudo</label><br />
              <input type="text" id="author" name="author" placeholder="Pseudo" />
          </div>
          <div>
              <label for="comment">Commentaire</label><br />
              <textarea id="comment" name="comment" placeholder="Votre commentaire"></textarea>
          </div>
          <div>
              <input id="btn-validation" type="submit" />
          </div>
        </form>

<?php
while ($comment = $comments->fetch())
{
?>
        <div class="comments_post">
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong><em class="date"> le <?= $comment['comment_date_fr'] ?></em></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <a class="signal" href="#">signaler</a>
        </div>

<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
</div>
