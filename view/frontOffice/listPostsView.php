<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
?>

<div class="container">
    <div class="row">

        <div class="post-preview col-lg-12 col-md-12">
                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                    <h2 class="post-title">
                        <?= htmlspecialchars($data['title']) ?>
                    </h2>
                    <h3 class="post-subtitle">
                        Chapitre
                        <?= htmlspecialchars($data['id']) ?>
                    </h3>
                </a>


                <p class="post-meta">Ecrit par
                    <a href="view/frontOffice/about.php">Jean Forteroche</a>
                    <em>le <?= $data['creation_date_fr'] ?></em>
                </p>

                <p><?= $extract=substr($data['content'],0,180);
                  echo $extract . "[...]";?>
                </p>



                <p><em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em></p>
            </div>
        </div>


    </div>


</div>
    <?php
          }
          $posts->closeCursor(); ?>

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

  <div class="container newsletter card card-image">



<!-- Content -->
<div class="inscription">
        <h5><i class="fa fa-envelope-o"></i> Inscrivez-vous à la newsletter</h5>
        <h3 class="card-title"><strong>Restons en contact</strong></h3>
        <p>Soyez au courant des dernières actualités ou de la prochaine sortie d'un chapitre.</p>

        <form class="" action="index.html" method="post">
          <div class="form-row">
            <div class="col">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                <input name="admin" type="text" id="lastname" placeholder="Votre nom" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                <input type="email" name="email" id="email"  placeholder="Entrez votre email" class="form-control"/>
              </div>
            </div>
            <div class="col-md-3 ">
                <button class="btn btn-primary subscribe"><i class="fa fa-paper-plane"></i> s'inscrire</button>
            </div>
          </div>
        </form>
        <!-- Content -->
</div>
</div>


<!-- Card -->

        <?php $content = ob_get_clean(); ?>

        <?php require('template.php'); ?>

        </body>

        </html>
