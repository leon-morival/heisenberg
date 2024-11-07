<?php
session_start();

if (!isset($_SESSION['contacts'])) {
    $_SESSION['contacts'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    if (!empty($name) && !empty($telephone) && !empty($email)) {
        $_SESSION['contacts'][] = ["name" => $name, "telephone" => $telephone, "email" => $email];
    }
}

function afficherContact() {
    if (isset($_SESSION['contacts']) && !empty($_SESSION['contacts'])) {
        foreach ($_SESSION['contacts'] as $contact) {
            echo "<tr>";
            echo "<td class='px-4 py-2 border'>" . $contact['name']. "</td>";
            echo "<td class='px-4 py-2 border'>" . $contact['telephone'] . "</td>";
            echo "<td class='px-4 py-2 border'>" . $contact['email'] . "</td>";
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
