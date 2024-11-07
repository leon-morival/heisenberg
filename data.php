<?php
require_once("./includes/connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    if (!empty($name) && !empty($telephone) && !empty($email)) {
        $insert = $conn->query("INSERT INTO `user` (`name`, `email`, `telephone`) VALUES ('$name', '$email', '$telephone');");
    }
}

function afficherContact($conn) {
    $data = $conn->query("SELECT * FROM user");
    if ( !empty($data)) {
        foreach ($data as $row) {

            echo "<tr>";
            echo "<td class='px-4 py-2 border'>" . $row['name']. "</td>";
            echo "<td class='px-4 py-2 border'>" . $row['telephone'] . "</td>";
            echo "<td class='px-4 py-2 border'>" . $row['email'] . "</td>";
            echo "<td class='px-4 py-2 border text-center'>";
            echo "<form action='delete.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
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
