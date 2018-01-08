<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
        <h1>Page d'accueil : Billet simple pour l'Alaska</h1>
        <h2>Les articles du roman</h2>


        <?php
        while ($data = $posts->fetch())
        {
        ?>
          <div class="news container-fluid">
              <h3>
                    <?= htmlspecialchars($data['title']) ?>
                    <em>le <?= $data['creation_date_fr'] ?></em>
              </h3>

              <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                    <br />
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em>
                </p>
            </div>

          <?php
          }
          $posts->closeCursor();
          ?>
          <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
    </body>
</html>
