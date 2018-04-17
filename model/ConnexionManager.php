<?php
require_once("model/Manager.php");

class ConnexionManager extends Manager
{

	public function addAdmin($adminName, $adminEmail, $psw_hache)
  {
    $db = $this->dbConnect();
	$admins = $db->prepare('INSERT INTO configs(admin, email_address, password) VALUES(?, ?, ?)');
	$addedAdmin = $admins->execute(array($adminName, $adminEmail, $psw_hache));

    return $addedAdmin;
  }


    public function log()
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, password FROM configs WHERE admin = :admin');
	$req->bindValue(':admin', $_POST['adminName'], PDO::PARAM_STR);
    $req->execute();//(array('admin' => $adminName));
    $logResult = $req->fetch();

    return $logResult;
  }
}
