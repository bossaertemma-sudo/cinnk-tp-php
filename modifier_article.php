<?php


//on verifie que l'id est un nombre et qu'il est renseigné.
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("erreur id non valide");
}

require 'connexion_db.php';
$requete = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
$requete->execute([$_GET['id']]);
$article = $requete->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    die("cet article n'existe pas");
}


//traitement du form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && is_numeric($_POST['id'])) {
    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {
        $requete = $pdo->prepare("UPDATE articles SET titre = ?,contenu= ? WHERE id = ?");
        $requete->execute([$_POST['titre'], $_POST['contenu'], $_POST['id']]);
        header("Location: blog.php");
        exit();
    }
}
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier un article</title>
</head>
<body>
<a href="blog.php">
    retour
</a>
<h1>
    Modifier l'article
</h1>
<form style="display: flex;flex-direction: column;gap: 10px" method="post">
    <input value="<?php echo $article['id'] ?>" type="hidden" name="id">
    <input type="text" name="titre" placeholder="Le titre de l'article" required
           value="<?php echo $article['titre'] ?>">
    <textarea name="contenu" rows="10" required
              placeholder="Le contenu de l'article"><?php echo $article['contenu'] ?></textarea>
    <button type="submit">
        Modifier
    </button>
</form>
</body>
</html>

