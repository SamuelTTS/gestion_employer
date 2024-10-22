<?php
$host = "localhost";
$db = "gestion_employer";
$user = "root";
$password = "@Samuel@.24";

$connexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);

$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
