<?php
require_once("./includes/connect.php");

if (isset($_POST['id'])) {
    $id = trim($_POST['id']);

    if (filter_var($id, FILTER_VALIDATE_INT)) {
        $delete = $conn->prepare("DELETE FROM user WHERE id = :id");
        $delete->bindParam(':id', $id, PDO::PARAM_INT);

        if ($delete->execute()) {
            echo "<script>alert('Contact $id a été supprimé avec succès.'); window.location.href = 'contact.php';</script>";
        } else {
            echo "<script>alert('Erreur lors de la suppression du contact.'); window.location.href = 'contact.php';</script>";
        }
    } else {
        echo "<script>alert('L\'ID fourni n\'est pas valide.'); window.location.href = 'contact.php';</script>";
    }
} else {
    echo "<script>alert('Aucun ID fourni pour la suppression.'); window.location.href = 'contact.php';</script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Location: contact.php');
    exit;
}

