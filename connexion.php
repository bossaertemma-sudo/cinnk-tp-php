<?php
session_start();
if($_SESSION['est_connecte']){
    header("Location: blog.php");
}


//traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        require 'connexion_db.php';
        $requete = $pdo->prepare("SELECT * FROM auteurs WHERE pseudo = ? ");
        $requete->execute([$_POST['pseudo']]);
        $auteur = $requete->fetch(PDO::FETCH_ASSOC);



        if ($auteur) {
            //on compare le password entré par l'user avec celui de la base de donnée
            if (password_verify($_POST['password'], $auteur['password'])) {
                $_SESSION['pseudo'] = $auteur['pseudo'];
                $_SESSION['est_connecte'] = true;
                header("Location: blog.php");
                exit;
            }else{
                //si password incorrect
                $erreur = "Mot de passe incorrect";
            }
        } else {
            //si pseudo incorrect
            $erreur = "Identifiant incorrect";
        }
    }
}

include 'header.php';

?>
<h2>
    Connexion
</h2>

<?php
if (!empty($erreur)) {
    ?>
    <p style="color: red;font-weight: bold;font-size: 18px">
        <?php echo $erreur; ?>
    </p>
    <?php
}
?>
<form style="display: flex;flex-direction: column;gap: 10px" method="post">
    <input type="text" name="pseudo" required>
    <input type="password" name="password" required>
    <button type="submit">
        Se connecter
    </button>
</form>
<?php
include 'footer.php';
?>
