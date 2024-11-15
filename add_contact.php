<?php
require_once("./includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bsdvName = $_POST['name'] ?? '';
    $bsdvTelephone = $_POST['telephone'] ?? '';
    $bsdvEmail = $_POST['email'] ?? '';

    if ($bsdvName && $bsdvTelephone && $bsdvEmail) {
        $bsdvName = htmlspecialchars($bsdvName, ENT_QUOTES, );
        $bsdvTelephone = htmlspecialchars($bsdvTelephone, ENT_QUOTES, );
        $bsdvEmail = filter_var($bsdvEmail, FILTER_SANITIZE_EMAIL);
        $bsdvStmt = $bsdvConn->prepare("INSERT INTO `user` (`name`, `email`, `telephone`) VALUES (:name, :email, :telephone)");
        $bsdvStmt->bindParam(':name', $bsdvName);
        $bsdvStmt->bindParam(':telephone', $bsdvTelephone);
        $bsdvStmt->bindParam(':email', $bsdvEmail);
        $bsdvStmt->execute();
        
    }
}

function afficherContact($bsdvConn) {
    $bsdvData = $bsdvConn->query("SELECT * FROM user");
    if ($bsdvData) {
        foreach ($bsdvData as $bsdvRow) {
            echo "<tr>";
            echo "<td class='px-4 py-2 border'>{$bsdvRow['name']}</td>";
            echo "<td class='px-4 py-2 border'>{$bsdvRow['telephone']}</td>";
            echo "<td class='px-4 py-2 border'>{$bsdvRow['email']}</td>";
            echo "<td class='px-4 py-2 border text-center'>";
            echo "<form action='delete.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='{$bsdvRow['id']}'>";
            echo "<button type='submit' title='Supprimer' onclick='return confirm(\"Voulez-vous vraiment supprimer ce contact ?\");' style='color:#C9112A;'>";
            echo "<i class='fas fa-trash-alt'></i>";
            echo "</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3' class='px-4 py-2 border text-center'>Aucun contact ajouté.</td></tr>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Location: index.php');
    exit;
}
