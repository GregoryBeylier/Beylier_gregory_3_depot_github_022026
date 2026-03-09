<?php

//On sécurise TOUTES les données du formulaire dès le début
$titre = isset($_POST['titre']) ? htmlspecialchars($_POST['titre']) : '';
$artiste = isset($_POST['artiste']) ? htmlspecialchars($_POST['artiste']) : '';
$description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
$image = isset($_POST['image']) ? htmlspecialchars($_POST['image']) : '';

$erreur = []; // Tableau pour stocker les messages d'erreur

// traitement.php : Traitement du formulaire d'ajout d'une oeuvre
if (empty($titre)) {
    $erreur[] = "Le titre de l'oeuvre est obligatoire.";
}
// On vérifie que le champ artiste n'est pas vide
if (empty($artiste)) {
    $erreur[] = "Le nom de l'artiste est obligatoire.";
}
// On vérifie que le champ description n'est pas vide et qu'il fait au moins 3 caractères
if (empty($description) || strlen($description) < 3) {
    $erreur[] = "La description doit faire au moins 3 caractères.";
}
// On vérifie que le lien est une URL valide
if (empty($image) || !filter_var($image, FILTER_VALIDATE_URL)) {
    $erreur[] = "Le lien doit être une URL valide (https://...)";
}

// S'il y a des erreurs, on les affiche et on arrête le script
if (!empty($erreur)) {
    foreach ($erreur as $message) {
        echo "<p>$message</p>";
    }
    echo '<p><a href="ajouter.php">Retour au formulaire</a></p>';
    exit();
}
