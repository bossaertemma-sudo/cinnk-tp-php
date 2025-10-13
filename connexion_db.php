<?php

$dsn = "mysql:host=localhost;dbname=demo;charset=utf8";
$user = "*****";
$password = "*****";

try {
    $pdo = new PDO($dsn, $user, $password);
    // définir l'affichage des erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    //capturer l'erreur pour afficher le message.
    die("Erreur de connexion : " . $erreur->getMessage());
}
