<?php
require 'database_connect.php';

$sql = 'SELECT * FROM user';
$result = $connexion->query($sql);
$users = $result->fetchAll(PDO::FETCH_ASSOC);

$message = " ";
foreach ($users as $index => $userse) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($email == $userse['email'] && $password == $userse['password']) {
            header("Location: gestion.php");
            exit; // Assurez-vous d'utiliser exit() après header() pour arrêter l'exécution du script immédiatement
        } else {
            $message = "identifiant incorrect";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <title>Connexion</title>
</head>

<body>
    <div class="form">
        <h1 class="titre" style="color:#2bc48a;">CONNEXION</h1>
        <a href="index.html" class="back_btn text-decoration-none"><img src="images/back.png"> Retour</a>
        <p class="message pb-1 mb-1 mt-4 text-center text-danger border-danger animate__animated animate__bounce">
            <?php echo $message; ?>
        </p>
        <form action="connexion.php" method="POST">
            <input type="email" name="email" id="email" placeholder="Email" class="m-6">
            <br>
            <input type="password" name="password" id="password" placeholder="Mot de passe" required>

            <input type="submit" value="Connexion">
        </form>

    </div>

</body>

</html>