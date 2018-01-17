<?php $title = htmlspecialchars($post['title']);
$picture = htmlspecialchars($post['picture']); ?>

<?php ob_start(); ?>
        <div class="container">
          <p><a href="index.php">Retour à la liste des billets</a></p>
          <div class="news">
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
                <p><em>Posté par Jean Forteroche le <?= $post['creation_date_fr'] ?></em>
            </p>
          </div>


            <form class="add_comment" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
              <h4>Postez un commentaire</h4>
              <div class="add_pseudo">
                    <label for="author">Pseudo : </label>
                    <input type="text" id="author" name="author" placeholder="Pseudo" />
              </div>

              <div class="add_your_comment">
                    <label for="comment">Commentaire : </label>
                    <textarea id="comment" name="comment" placeholder="Votre commentaire"></textarea>
              </div>
              <input id="btn-validation" type="submit" />
              </div>
            </form>

<?php
while ($comment = $comments->fetch())
{
?>
        <div class="comments_post">
          <div class="info">
            <p class="comments_author"><strong><?= htmlspecialchars($comment['author']) ?></strong><br />
            <em class="comments_date"> Posté le <?= $comment['comment_date_fr'] ?></em></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
          </div>
          <div class="signal-event">
            <p><a class="signal" href="#">signaler</a></p>
          </div>
        </div>



<?php
}

?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
