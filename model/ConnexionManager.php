<?php
require_once("model/Manager.php");

class ConnexionManager extends Manager
{

  public function connectAdmin ()
  {

    $db = $this->dbConnect();
  if (isset($_POST['formConnexion']))
  {
    $admin = htmlspecialchars($_POST['admin']);
    $password = sha1($_POST['password']);


    if (!empty($_POST['admin']) AND !empty($_POST['password'])
    {
      $adminslength = strlen($admin);
      if ($adminlength <= 255)
      {
              $insertmbr = $bdd->prepare("INSERT INTO admins(admin, mail, password) VALUES(?,?,?)");
              $insertmbr->execute(array($admin, $mail, $password));
      }
      else
      {
        $error = "votre nom d'utilisateur ne doit pas dépasser 255 caractères";
      }
    }
    else
    {
      $error = "Les champs pseudo et mot de passe doivent être tous les deux complétés";
    }
  }
}
}
