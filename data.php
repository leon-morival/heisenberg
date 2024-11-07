<?php
require_once("./connect.php");

// $id = $_GET['id'];
// $delete = $conn->query("DELETE FROM user WHERE id='$id'");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    if (!empty($name) && !empty($telephone) && !empty($email)) {
        $insert = $conn->query("INSERT INTO `user` (`name`, `email`, `telephone`) VALUES ('$name', '$email', '$telephone');");
    }
}

// function deleteRow($id, $conn){
//     $conn->query("DELETE FROM `user` WHERE `id`= 1");
// }

function afficherContact($conn) {
    $data = $conn->query("SELECT * FROM user");
    if ( !empty($data)) {
        foreach ($data as $row) {

            echo "<tr>";
            echo "<td class='px-4 py-2 border'>" . $row['name']. "</td>";
            echo "<td class='px-4 py-2 border'>" . $row['telephone'] . "</td>";
            echo "<td class='px-4 py-2 border'>" . $row['email'] . "</td>";
            echo "<td class='px-4 py-2 border'>";
            echo "<form action='delete.php' method='POST'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit' class='delete'>Delete</button>";
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
