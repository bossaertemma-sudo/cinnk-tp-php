<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id']) || !is_numeric($_POST['id']))
{
    die("Action non autorisé");
}

require 'connexion_db.php';

/** @var PDO $pdo */

$requete = $pdo->prepare("UPDATE SET articles  WHERE id = ?");
$requete->execute([$_POST['id']]);

header('Location: blog.php');

?>
