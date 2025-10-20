<?php
require 'connexion_db.php'; 

session_start();
if($_SESSION['est_connecte']){
    header("Location: blog.php"); 
    exit; 
}

$id = (int)$_GET['id'];
$pdo->prepare("UPDATE messages SET lu = 1 WHERE id = ?")->execute([$id]);
header("Location: admin.php");
