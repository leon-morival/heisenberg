<?php
require_once('data.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./css/output.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP PHP</title>
</head>
<body>
   <h1 class="text-2xl text-center">Formulaire</h1>
   
   <div class="w-full max-w-xs">
      <form method="POST" action="data.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Nom
            </label>
            <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Votre nom">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="telephone">
                Téléphone
            </label>
            <input name="telephone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telephone" type="tel" placeholder="Votre téléphone">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Votre email">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Ajouter un Contact
            </button>
        </div>
      </form>
   </div>

   <h2 class="text-xl text-center">Liste des Contacts</h2>
   <table class="min-w-full table-auto border-collapse border border-gray-300">
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
</html>
