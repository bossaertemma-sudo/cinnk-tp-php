<?php

require 'connexion_db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = ($_POST['nom']);
    $email = ($_POST['email']);
    $contenu = ($_POST['message']);
     $requete = $pdo->prepare("INSERT INTO messages (nom, email, contenu) VALUES (?, ?, ?)");
        $message = "Message envoyé";
        exit;
    } 
    if (empty($nom)) {
    $erreur = "Erreur : nom manquant";
} elseif (!empty($email)) {
    $erreur = "Erreur : e-mail manquant";
} elseif (!empty($contenu)) {
    $erreur = "Erreur : message manquant";
} else {
}

include 'header.php';
?>


<body>
  <form style="display: flex;flex-direction: column;gap: 10px" method="post">
    <input type="text" name="nom" required>
    <input type="email" name="email" required>
     <input type="textarea" name="message" required>
    <button type="submit">
        envoyer message
    </button>
</form>  

<?php
include 'footer.php';

?>