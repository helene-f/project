<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
?>
    <div class= "row">
          <div class="chapter-list col-xs-12 col-sm-12 col-md-9 col-lg-9 container">
              <div class= "row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 picture">
                      <?php $picture = $data['picture'];?>
                      <img src="<?php echo $picture; ?>" alt="" />
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 resume">
                  <h3>
                        Chapitre <?= htmlspecialchars($data['id']) ?> : <?= htmlspecialchars($data['title']) ?>
                        <em>le <?= $data['creation_date_fr'] ?></em>
                  </h3>
                  <p>
                  <?= nl2br(htmlspecialchars($data['content'])) ?>
                  </p>
                  <br />
                  <p><em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em>
                  </p>
                </div>
              </div>
            </div>


          <?php
          }
          $posts->closeCursor();
          ?>
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <h4>A propos</h4>
            <img id="logo" src="public/img/forteroche.png" alt="auteur">
            <p>Jean Forteroche est un auteur, spécialiste des romans d'explorations.</p>
          </div>
        </div>



          <?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
    </body>
</html>
