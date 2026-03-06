<?php
require 'header.php';
require 'bdd.php';

// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if (empty($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$pdo = connexion(); // Connexion à la base de données
$requette = $pdo->prepare("SELECT * FROM oeuvres WHERE id = :id"); // Requête pour récupérer une oeuvre en fonction de son id
$requette->execute([':id' => intval($_GET['id'])]); // Exécution de la requête en passant l'id de l'oeuvre à récupérer
$oeuvre = $requette->fetch(PDO::FETCH_ASSOC); // Récupération de l'oeuvre sous forme de tableau associatif

// Si aucune oeuvre trouvé, on redirige vers la page d'accueil
if (is_null($oeuvre)) {
    header('Location: index.php');
    exit();
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
            <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>