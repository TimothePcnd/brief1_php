<?php
// Démarrage de la session $_SESSION
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message enregistré</title>
</head>
<body>
        <h2>Liste des messages enregistrés</h2>
<?php
// Affichage des données stockées de la page "message.txt"
echo "<pre>" . htmlspecialchars(file_get_contents("message.txt")) . "</pre>";
?>

</body>
</html>
