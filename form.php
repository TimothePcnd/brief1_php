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
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['corp-message']) ? trim($_POST['corp-message']) : '';

    // Vérification que le champ n'est pas vide
    if ($name !== '' && $email !== '' && $message !== '') {
        // Stockage du message dans la session
        $_SESSION['message'] = "Nom : $name Email : $email Message : $message --------------";
        $_SESSION['confirmation'] = "Merci pour votre confirmation, $name!";

        header("Location: form.php");
        exit();
    } else {
        $_SESSION['message'] = "Veuillez remplir les champs suivants !";
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
    echo "<p>" . htmlspecialchars($_SESSION['confirmation']) . "</p>";

    echo file_put_contents("message.txt",$_SESSION['message'], FILE_APPEND);
    // suppression le message stocké en session
    unset($_SESSION['message']);
}
?>

<form action="form.php" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="nom" required>

    <label for="email">Entrer votre email: </label>
    <input type="email" name="email" id="mail" required>

    <label for="name">Message : </label>
    <textarea type="text" id="form-message" name="corp-message" required></textarea>

    <button>Envoyez</button>

</form>
</body>
</html>