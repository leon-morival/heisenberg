<?php
$servername = "";
$username = "";
$password = "";
$dbName = "";

try {
  $bsdvConn = new PDO("mysql:host=$servername", $username, $password);
  $bsdvConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $bsdvConn->query("CREATE DATABASE IF NOT EXISTS $dbName");

  // Sélectionner la base de données
  $bsdvConn->exec("USE $dbName");
  $bsdvTableQuery = "
      CREATE TABLE IF NOT EXISTS `user` (
          `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
          `name` VARCHAR(50) NOT NULL,
          `email` VARCHAR(80) NOT NULL UNIQUE,
          `telephone` INT(20) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  ";
  $bsdvConn->exec($bsdvTableQuery);

} catch (PDOException $e) {
  echo "Erreur de bsdvConnexion : " . $e->getMessage();
  exit;
}
