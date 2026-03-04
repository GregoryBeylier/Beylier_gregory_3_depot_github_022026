<?php

function connexion() // Fonction de connexion à la base de données
{
    try {

        $pdo = new PDO(
            'mysql:host=localhost;dbname=artbox;charset=utf8',
            'root',
            ''
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $pdo;
}
