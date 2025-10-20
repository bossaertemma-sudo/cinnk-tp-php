<?php
//traitement du formulaire POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //verifier que les champs sont remplies
    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {
        //ajout a la bdd
        require 'connexion_db.php';
        /** @var PDO $pdo */

        //preparation de la requete pour eviter les injections sql
        $requete = $pdo->prepare("INSERT INTO articles (titre,contenu) VALUES  (?, ?)");

        //execution avec en params les valeurs à inserer
        $requete->execute([$_POST['titre'], $_POST['contenu']]);

        //redirection vers la page du blog
        header("Location: blog.php");
        //fin du script
        exit();
    }
}

include 'header.php';
?>
<h1>
    Ajouter un nouvel article
</h1>
<form style="display: flex;flex-direction: column;gap: 10px" method="post">
    <input type="text" name="titre" placeholder="Le titre de l'article" required>
    <textarea name="contenu" rows="10" required placeholder="Le contenu de l'article"></textarea>
    <button type="submit">
        Publier
    </button>
</form>
<?php
include 'footer.php';
?>