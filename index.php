<?php // index.php : Page d'accueil du site web
require 'header.php';
require 'bdd.php';
?>

<?php
$pdo = connexion(); // Connexion à la base de données
$requete = $pdo->query("SELECT * FROM oeuvres"); // Requête pour récupérer toutes les oeuvres
$oeuvres = $requete->fetchAll(PDO::FETCH_ASSOC); // Récupération des oeuvres sous forme de tableau associatif
?>

<div id="liste-oeuvres">
    <?php foreach ($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>


<?php require 'footer.php'; ?>