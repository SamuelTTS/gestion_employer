<?php
require 'database_connect.php';

if (isset($_POST["ajouter"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $date = $_POST["date"];
    $adresse = $_POST["adresse"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $fonction = $_POST["fonction"];
    $salaire = $_POST["salaire"];

    $sql = 'INSERT INTO personnel(nom, prenom,date,adresse,tel,email,fonction,salaire)
             VALUES(:nom, :prenom,:date,:adresse,:tel,:email,:fonction,:salaire)';
    $statement = $connexion->prepare($sql);
    $statement->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':date' => $date,
        ':adresse' => $adresse,
        ':tel' => $tel,
        ':email' => $email,
        ':fonction' => $fonction,
        ':salaire' => $salaire,
    ]);
    if($statement){
    echo "personnel ajouté avec succès !";
    header("location:gestion.php");
}else{
    $message = "Employé non ajouté";
}
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajouter.css">
    <title>Ajout du personnel</title>
</head>

<body>
    <div class="form">
        <a href="gestion.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter un employe</h2>
        <p class="erreur_message">
            <?php
            // si la variable message existe , affichons son contenu
            if (isset($message)) {
                echo $message;
            }
            ?>
        <form action="" method="POST">

            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="nom de l'employe" required>

            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="prenom de l'employe" required>

            <label for="date">Date de naissance</label>
            <input type="date" name="date" id="date" placeholder="date de naissance" required>

            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" placeholder="adresse de l'employer" required>

            <label for="telephone">Tel</label>
            <input type="tel" name="tel" id="tel" placeholder="numero de telephone" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="email de l'employe" required>

            <label for="fonction">Fonction</label>
            <input type="text" name="fonction" id="fonction" placeholder="fonction de l'employe" required>

            <label for="salaire">Salaire</label>
            <input type="text" name="salaire" id="salaire" placeholder="salaire de l'employe" required>

            <input type="submit" name="ajouter" id="ajouter" value="Ajoute employe">
        </form>
    </div>
</body>

</html>