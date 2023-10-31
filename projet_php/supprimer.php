<?php
$host = "localhost";
$db = "gestion_employer";
$user = "root";
$password = "";
$connexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Traitement de la suppression
$id= $_GET['id'];
    $sql = 'DELETE FROM personnel WHERE id = :id';
    $statement = $connexion->prepare($sql);
    $statement->execute([
        ':id' => $id,
    ]);
if($statement){
    header("location:gestion.php");
}
