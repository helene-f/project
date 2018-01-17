<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet">
        <link href="public/css/bootstrap.css" rel="stylesheet">
    </head>

    <body>
      <header>
          <h1><?= htmlspecialchars($title)?><br />Un roman de Jean Forteroche</h1>
      </header>
        <?= $content ?>
        <footer class="container-fluid">
          <p id="copyright">© 2017 / Tous droits réservés. Ce blog est entièrement développé en html, css, js et php</p>
        </footer>
        <script src="public/js/jquery.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
    </body>
</html>
