<?php

//namespace Openclassrooms\Blog\Model;

require_once("model/Manager.php");

class ContactManager extends Manager
{
    public function postContact($contactName, $contactEmail)
  {
      $db = $this->dbConnect();
      $contacts = $db->prepare('INSERT INTO contacts(/*contact_id, */contact_name, contact_email) VALUES(/*?, */?, ?)');
      $testLines = $contacts->execute(array(/*$contactId, */$contactName, $contactEmail));

      return $testLines;
  }
}
