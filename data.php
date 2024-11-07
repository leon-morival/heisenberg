<?php
require_once("./includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($name && $telephone && $email) {
        $name = htmlspecialchars($name, ENT_QUOTES, );
        $telephone = htmlspecialchars($telephone, ENT_QUOTES, );
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $stmt = $conn->prepare("INSERT INTO `user` (`name`, `email`, `telephone`) VALUES (:name, :email, :telephone)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
    }
}

function afficherContact($conn) {
    $data = $conn->query("SELECT * FROM user");
    if ($data) {
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td class='px-4 py-2 border'>{$row['name']}</td>";
            echo "<td class='px-4 py-2 border'>{$row['telephone']}</td>";
            echo "<td class='px-4 py-2 border'>{$row['email']}</td>";
            echo "<td class='px-4 py-2 border text-center'>";
            echo "<form action='delete.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='{$row['id']}'>";
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
