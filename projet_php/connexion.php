<?php
$message=" ";
if (isset($_POST['code'])) {
    if ($_POST['code'] == 'gestion2405') {
        header("Location: gestion.php");
        exit; // Assurez-vous d'utiliser exit() après header() pour arrêter l'exécution du script immédiatement
    }else{
        $message="code incorrect";
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
    <title>Connexion</title>
</head>

<body>
    <DIV class="form">
    <h1>CONNEXION</h1>
    <p class="message" style="color:red;font-size: 30px;"><?php echo $message ?></p>
    <form action="connexion.php" method="POST">
        
        <label for="code">Code d'accès</label>
        <input type="password" name="code" id="code" placeholder="Code d'accès" required>

        <input type="submit" value="Connexion">
    </form>
    <a href="index.html"></a>
    </DIV>
   
</body>

</html>
