<?php
$host = "localhost";
$db = "gestion_employer";
$user = "root";
$password = "";
$connexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM personnel';
$result = $connexion->query($sql);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['logout'])) {
    // Destruction de toutes les variables de session
    session_unset();

    // Destruction de la session
    session_destroy();

    // Redirection vers la page de connexion
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GESTION DU PERSONNEL</title>
</head>

<body>
    <h1 style="background-color:rgb(158, 211, 24)" >LISTE DES EMPLOYES</h1>
    <form action="" method="POST">
        <input class="boutton" style="float:right;margin-right:10px; border-radius:5px; height:30px; padding-right:25px; padding-top:0; padding-left:25px; margin-bottom:25px; background-color:red" type="submit" name="logout" value="Déconnexion">
    </form>

    <a href="ajouter.php" class="Btn_add" style="background-color: #1830ba" > <img src="images/plus.png"> Ajouter</a>

    <table class="table">
        <thead>
            <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>date de naissance</th>
                <th>adresse</th>
                <th>telephone</th>
                <th>email</th>
                <th>fonction</th>
                <th>salaire</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $index => $row) : ?>
                <tr style="padding-right: 25px">
                    <td> <?php echo $row['nom'] ?> </td>
                    <td> <?php echo $row['prenom'] ?> </td>
                    <td> <?php echo $row['date'] ?> </td>
                    <td> <?php echo $row['adresse'] ?> </td>
                    <td> <?php echo $row['tel'] ?> </td>
                    <td> <?php echo $row['email'] ?> </td>
                    <td> <?php echo $row['fonction'] ?> </td>
                    <td> <?php echo $row['salaire'] ?> </td>
                    <td class="action" style="padding-left: 25px;">
                        <a style="padding-right: 25px" href="modifier.php?id=<?= $row['id'] ?>"><img src="images/pen.png"></a>
                        <a href="supprimer.php?id=<?= $row['id'] ?>"><img src="images/trash.png"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>