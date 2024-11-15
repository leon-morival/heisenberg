<?php
$bsdvServername = "";
$bsdvUsername = "";
$bsdvPassword = "";
$bsdvDbName = "contacts_db";

try {
    $bsdvConn = new PDO("mysql:host=$bsdvServername", $bsdvUsername, $bsdvPassword);
    $bsdvConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $bsdvConn->exec("CREATE DATABASE IF NOT EXISTS $bsdvDbName");

    $bsdvConn->exec("USE $bsdvDbName");

    $bsdvTableQuery = "
        CREATE TABLE IF NOT EXISTS `contacts` (
            `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(50) NOT NULL,
            `email` VARCHAR(80) NOT NULL UNIQUE,
            `telephone` VARCHAR(20) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $bsdvConn->exec($bsdvTableQuery);

} catch (PDOException $e) {
    echo "Erreur de Connexion : " . $e->getMessage();
    exit;
}
?>
