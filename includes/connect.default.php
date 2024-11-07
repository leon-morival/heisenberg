<?php
$servername = "";
$username = "";
$password = "";
$dbName = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->query("CREATE DATABASE IF NOT EXISTS $dbName");

  // Sélectionner la base de données
  $conn->exec("USE $dbName");
  $tableQuery = "
      CREATE TABLE IF NOT EXISTS `user` (
          `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
          `name` VARCHAR(50) NOT NULL,
          `email` VARCHAR(80) NOT NULL UNIQUE,
          `telephone` INT(20) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  ";
  $conn->exec($tableQuery);

} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
  exit;
}
