<?php
$host = "localhost";
$db = "gestion_employer";
$user = "root";
$password = "";

// Create a PDO connection
try {
    $connexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$id = $_GET['id'];

// Use prepared statements to avoid SQL injection
$sql = 'SELECT * FROM personnel WHERE id = :id';
$stmt = $connexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$rows = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['modifier'])) {
    $id = $_GET['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $fonction = $_POST['fonction'];
    $salaire = $_POST['salaire'];

    // Use prepared statements for the UPDATE query as well
    $sql = "UPDATE personnel SET nom = :nom, prenom = :prenom, date = :date, adresse = :adresse, tel = :tel, email = :email, fonction = :fonction, salaire = :salaire WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':fonction', $fonction);
    $stmt->bindParam(':salaire', $salaire);
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if ($result) {
        header("location: gestion.php");
    } else {
        echo "Erreur lors de la mise à jour";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajouter.css">
    <title>Modifier</title>
</head>

<body>
    <form action="" method="POST">

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" placeholder="nom de l'employe" value="<?php echo $rows["nom"] ?>" required>

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" placeholder="prenom de l'employe" value="<?php echo $rows["prenom"] ?>" required>

        <label for="date">Date de naissance</label>
        <input type="date" name="date" id="date" placeholder="date de naissance" value="<?php echo $rows["date"] ?>" required>

        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="adresse" placeholder="adresse de l'employe" value="<?php echo $rows["adresse"] ?>" required>

        <label for="telephone">Tel</label>
        <input type="tel" name="tel" id="tel" placeholder="numero de telephone" value="<?php echo $rows["tel"] ?> " required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email de l'employe" value="<?php echo $rows["email"] ?>" required>

        <label for="fonction">Fonction</label>
        <input type="text" name="fonction" id="fonction" placeholder="fonction de l'employe" value="<?php echo $rows["fonction"] ?>" required>

        <label for="salaire">Salaire</label>
        <input type="text" name="salaire" id="salaire" placeholder="salaire de l'employe" value="<?php echo $rows["salaire"] ?>" required>

        <input type="submit" name="modifier" id="modifier" value="modifier">

    </form>
</body>

</html>