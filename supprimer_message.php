<?php
session_start();
if($_SESSION['est_connecte']){
    header("Location: blog.php"); 
    exit; 
}
require 'connexion.php';
$id = (int)$_GET['id'];
$requete = $pdo->prepare("DELETE FROM messages WHERE id = ?");
$requete->execute([$id]);
header("Location: admin.php");
