<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        BLOG PHP
    </title>
</head>
<body>
<nav>
    <a href="blog.php">Accueil</a>

    <?php if (isset($_SESSION['est_connecte']) &&  $_SESSION['est_connecte']): ?>
        <a href="ajout_article.php">Ajouter un article</a>
        <a href="deconnexion.php">Déconnexion</a>
        <p>
            Bonjour <?php echo $_SESSION['pseudo']; ?>
        </p>
    <?php else: ?>
        <a href="connexion.php">Connexion</a>
    <?php endif; ?>

</nav>