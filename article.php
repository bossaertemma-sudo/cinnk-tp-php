<?php

//si l'id est pas présent on met une erreur
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Erreur: ID d'article non valide");
}

require 'connexion_db.php';

// recuperer l'article

/** @var PDO $pdo */
$requete = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
$requete->execute([$_GET['id']]);
$article = $requete->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    die("Cet article n'existe pas");
}

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon article</title>
</head>
<body>
<a href="blog.php">
    Retour à la liste des articles
</a>
<hr>
<div>
    <article>
        <h2>

            <?php echo $article['titre']; ?>

        </h2>
        <p>
            <em>
                <!--transformer la date format chaine de caractère en date et la formater-->
                Publié le <?php echo date("d/m/Y H:i", strtotime($article['date_creation'])); ?>
            </em>
        </p>
        <div>
            <?php
            //appliquer un saut de ligne automatique
            //empecher l'execution de code via htmlspecialchars
            echo nl2br(
                htmlspecialchars(
                    $article['contenu'], 0, 150
                ));
            ?>
        </div>
    </article>
</div>
</body>
</html>
