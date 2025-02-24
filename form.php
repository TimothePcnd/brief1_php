<?php
// Démarrage de la session $_SESSION
session_start();


// Vérification de la soumission du formulaire via la méthode POST
// Super Globale
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Récupération des données du formulaire
    //$name = $_POST['nom'];
    //var_dump($name);
    //$name = isset($_POST['nom']);
    $name = isset($_POST['nom']) ? trim($_POST['nom']) : '';

    // Vérification que le champ n'est pas vide
    if ($name !== '') {
        // Stockage du message dans la session
        $_SESSION['message'] = "Merci $name !";

        header("Location: form.php");
        exit();
    } else {
        $_SESSION['message'] = "Veuillez indiquer votre nom !";
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intro : Formulaire et session PHP</title>
</head>
<body>

<?php
// Affichage du message stocké en session
if (isset($_SESSION['message'])) {
    echo "<p>" . htmlspecialchars($_SESSION['message']) . "</p>";
    // suppression le message stocké en session
    unset($_SESSION['message']);
}
?>

<form action="form.php" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="nom" required>


    <button type="submit">Envoyer</button>
</form>
</body>
</html>