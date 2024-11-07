<?php 
require_once("connect.php");

$id = trim($_POST['id']);

if ($id != "") {
    $delete = $conn->query("DELETE FROM user WHERE id = '$id'");

    if (!$delete) {
        die("Cannot delete data from the database!");
    } else {
        echo "Contact $id has been deleted";
    }
} else {
    echo "No ID provided for deletion.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Location: contact.php');
    exit;
}
