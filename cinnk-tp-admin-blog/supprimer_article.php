<?php
//on verifie qu'on a bien une requete post, un id et un id de type nombre
if($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id']) || !is_numeric($_POST['id']))
{
    die("Action non autorisé");
}

require 'connexion_db.php';

/** @var PDO $pdo */

//on fait la requete pour delete
$requete = $pdo->prepare("DELETE FROM articles WHERE id = ?");
$requete->execute([$_POST['id']]);

//on redirige vers la liste des articles
header('Location: blog.php');