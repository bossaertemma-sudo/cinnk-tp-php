<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//include 'connexion_db.php'; // si le fichier n'existe pas => pas d'erreur.
require 'connexion_db.php'; // si le fichier n'existe pas => fatal error.

/**
 * @var $pdo PDO
 */

//récuperer tous les articles trié par ordre de création
$requete = $pdo->query("SELECT * FROM articles ORDER BY date_creation DESC");


include 'header.php';
?>


<h1>
    Mon blog
</h1>
<a href="ajout_article.php">
    Ajouter un nouvel article
</a>
<hr>
<!--Boucler sur tous les articles en mode tableau assiociatif ['clé' => 'valeur']-->
<?php while ($article = $requete ->fetch(PDO::FETCH_ASSOC)): ?>
    <article>
        <h2>
            <a href="article.php?id=<?php echo $article['id']; ?>">
                <?php echo $article['titre']; ?>
            </a>
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
            //couper la chaine de caractère a 15O caractères maximum
            echo nl2br(
                    htmlspecialchars(
                        substr($article['contenu'], 0, 150)
                    )) . "...";
            ?>
        </div>
        <div style="display: flex;gap:10px">
            <a href="modifier_article.php?id=<?php echo $article['id']; ?>">
                Modifier l'article
            </a>
            <form action="supprimer_article.php" method="post">
                <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
                <button type="submit" style="font-weight: bold;color: red">
                    Supprimer l'article
                </button>
            </form>

        </div>
    </article>
    <hr>
<?php endwhile; ?>
<?php
include 'footer.php';
?>
