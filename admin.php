<?php

require 'connexion_db.php'; 

session_start();
if($_SESSION['est_connecte']){
    header("Location: blog.php"); 
    exit; 
}

else { header("Location: connexion.php"); 
}


$requete= $pdo->prepare("SELECT nom, email,contenu_message, date_reception, FROM messages ORDER BY date_envoi DESC");
$messages = $requete->fetchAll(PDO::FETCH_ASSOC);

include 'header.php';
?>

<h1>Panneau d'administration</h1>

<table>
    <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Date</th>
        <th>Message</th>
    </tr>
    <tr>
        <td><?= htmlspecialchars($msg['nom']); ?></td>
        <td><?= htmlspecialchars($msg['email']); ?></td>
        <td><?= htmlspecialchars($msg['date_envoi']); ?></td>
        <td><?= htmlspecialchars($msg['message']); ?></td>
    </tr>
</table>

