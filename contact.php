<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="./css/output.css" rel="stylesheet">

</head>
<body>
    <?php require_once("./data.php") ?>
    <?php require_once("./header.php") ?>
    <h2 class="text-xl text-center">Liste des Contacts</h2>
   <table class="mx-auto table-auto border-collapse border border-gray-300 ">
      <thead>
        <tr>
          <th class="px-4 py-2 border">Nom</th>
          <th class="px-4 py-2 border">Téléphone</th>
          <th class="px-4 py-2 border">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php afficherContact(); ?>
      </tbody>
   </table>
</body>
<?php require_once("./footer.php") ?>
</html>