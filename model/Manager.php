<?php

namespace Helene\Project\Model;

class Manager
{
  protected function dbConnect() {
    $db = new \PDO ('mysql:host=localhost;dbname=project;charset=utf8', 'root', 'root');
    return $db;
  }
}
