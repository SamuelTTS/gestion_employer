<?php
require 'database_connect.php';
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
