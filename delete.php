<?php
require_once("./includes/db.php");

if (isset($_POST['id'])) {
    $bsdvId = trim($_POST['id']);

    if (filter_var($bsdvId, FILTER_VALIDATE_INT)) {
        $bsdvDelete = $bsdvConn->prepare("DELETE FROM contacts WHERE id = :id");
        $bsdvDelete->bindParam(':id', $bsdvId, PDO::PARAM_INT);

        if ($bsdvDelete->execute()) {
            echo "<script>alert('Contact $bsdvId a été supprimé avec succès.'); window.location.href = 'contact.php';</script>";
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

