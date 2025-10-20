<?php

include 'header.php';

//traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        require 'connexion_db.php';

        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $requete = $pdo->prepare("INSERT INTO auteurs (pseudo,password) VALUES (?,?)");
        $requete->execute([$_POST['pseudo'], $hash]);

        echo "Inscription réussie, vous pouvez maintenant vous connecter.";

    }
}
?>
<h2>
    Inscription
</h2>
<form style="display: flex;flex-direction: column;gap: 10px" method="post">
    <input type="text" name="pseudo" required>
    <input type="password" name="password" required>
    <button type="submit">
        S'inscrire
    </button>
</form>
<?php
include 'footer.php';
?>
