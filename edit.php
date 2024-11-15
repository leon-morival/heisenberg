<?php
require_once("./includes/db.php");

$bsdvId = $_GET['id'] ?? null;

if (!$bsdvId) {
    echo "ID non valide.";
    exit;
}

$bsdvStmt = $bsdvConn->prepare("SELECT * FROM user WHERE id = :id");
$bsdvStmt->bindParam(':id', $bsdvId);
$bsdvStmt->execute();
$bsdvContact = $bsdvStmt->fetch();

if (!$bsdvContact) {
    echo "Contact introuvable.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bsdvName = $_POST['name'] ?? '';
    $bsdvTelephone = $_POST['telephone'] ?? '';
    $bsdvEmail = $_POST['email'] ?? '';

    if ($bsdvName && $bsdvTelephone && $bsdvEmail) {
        $bsdvName = htmlspecialchars($bsdvName, ENT_QUOTES);
        $bsdvTelephone = htmlspecialchars($bsdvTelephone, ENT_QUOTES);
        $bsdvEmail = filter_var($bsdvEmail, FILTER_SANITIZE_EMAIL);

        $bsdvUpdateStmt = $bsdvConn->prepare("UPDATE user SET name = :name, telephone = :telephone, email = :email WHERE id = :id");
        $bsdvUpdateStmt->bindParam(':name', $bsdvName);
        $bsdvUpdateStmt->bindParam(':telephone', $bsdvTelephone);
        $bsdvUpdateStmt->bindParam(':email', $bsdvEmail);
        $bsdvUpdateStmt->bindParam(':id', $bsdvId);

        if ($bsdvUpdateStmt->execute()) {
            header("Location: contact.php");
            exit;
        } else {
            echo "Erreur lors de la mise à jour.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./css/output.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Contact</title>
</head>
<body>
<?php require_once("./includes/header.php") ?>

    <div class="w-full max-w-xs mx-auto mt-10">
        <h1 class="text-center text-2xl font-semibold">Modifier contact</h1>
        <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nom</label>
                <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="name" type="text" value="<?= htmlspecialchars($bsdvContact['name']) ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telephone">Téléphone</label>
                <input name="telephone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="telephone" type="tel" value="<?= htmlspecialchars($bsdvContact['telephone']) ?>" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="email" type="email" value="<?= htmlspecialchars($bsdvContact['email']) ?>" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Modifier le contact
                </button>
            </div>
        </form>
    </div>
</body>
<?php require_once("./includes/footer.php")?>

</html>
