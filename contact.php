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
    <?php require_once("./connect.php") ?>

   <table class="mx-auto table-auto  border border-gray-300 ">
   <caption class="caption-top">Liste des contacts</caption>  
   <thead>
        <tr class="bg-gray-100">
          <th class="px-4 py-2 border">Nom</th>
          <th class="px-4 py-2 border">Téléphone</th>
          <th class="px-4 py-2 border">Email</th>
          <th class="px-4 py-2 border">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php afficherContact($conn); ?>
      </tbody>
   </table>
</body>
<?php require_once("./footer.php") ?>
</html>