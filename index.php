<?php
/*define('BASE_PATH', dirname(realpath(__FILE__)) . '/');
define('VIEW_PATH', BASE_PATH . 'views/');
// Twig
require_once BASE_PATH.'vendors/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(VIEW_PATH);
$twig = new Twig_Environment($loader, array(
				'cache'	=>	BASE_PATH.'cache',
				'debug'	=>	true,
		  'auto_reload'	=>	true,
	 'strict_variables'	=>	true,
		   'autoescape'	=>	true,

));
// Use an autoloader...
require BASE_PATH . 'libs/Bootstrap.php';
require BASE_PATH . 'libs/Controller.php';
require BASE_PATH . 'libs/Model.php';
require BASE_PATH . 'libs/View.php';
new Bootstrap();
$view = new View();
$view->render(
		$twig->display('base_template.twig')
	);*/



require('controller/frontOffice.php');
/*require('controler/backOffice.php');*/

try {
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }

    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
          // Erreur ! On arrête tout, on envoie un exception, donc on saute directement au catch
            throw new Exception ('Aucun identifiant de billet envoyé');
        }
    }
  elseif ($_GET['action'] == 'addComment') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
          if (!empty($_POST['author']) && !empty($_POST['comment'])) {
              addComment($_GET['id'], $_POST['author'], $_POST['comment']);
          }
          else {
              throw new Exception ('tous les champs ne sont pas remplis !');
          }
      }
      else {
          throw new Exception ('aucun identifiant de billet envoyé');
      }
  }
}
else {
  listPosts();
}
}
catch(Exception $e) {
  $errorMessage = $e->getMessage();
  require('view/frontOffice/error.php');
}
