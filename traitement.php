<?php

function securiser($data)
{
    return htmlspecialchars($_POST[$data]);
}

//On sécurise TOUTES les données du formulaire dès le début
$titre = securiser('titre');
$artiste = securiser('artiste');
$description = securiser('description');
$lien_image = securiser('lien_image');

// traitement.php : Traitement du formulaire d'ajout d'une oeuvre
if (empty($_POST['titre'])) {
    $erreur[] = "Le titre de l'oeuvre est obligatoire.";
}
// On vérifie que le champ artiste n'est pas vide
if (empty($_POST['artiste'])) {
    $erreur[] = "Le nom de l'artiste est obligatoire.";
}
// On vérifie que le champ description n'est pas vide et qu'il fait au moins 3 caractères
if (empty($_POST['description']) || strlen($_POST['description']) < 3) {
    $erreur[] = "La description doit faire au moins 3 caractères.";
}
// On vérifie que le lien est une URL valide
if (empty($lien_image) || !filter_var($lien_image, FILTER_VALIDATE_URL)) {
    $erreur[] = "Le lien doit être une URL valide (https://...)";
}
