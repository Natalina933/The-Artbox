<?php
include('header.php');
require('bdd.php');

// Connexion à la base de données
$bdd = connexion();
if (!$bdd) {
    die('Erreur de connexion à la base de données');
}

// Vérifier si un ID est fourni dans l'URL
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

// Récupérer l'ID de l'œuvre depuis l'URL
$id = intval($_GET['id']);

// Préparer et exécuter la requête pour récupérer l'œuvre correspondante
$sqlquery = $bdd->prepare('SELECT * FROM oeuvres WHERE id = ?');
$sqlquery->execute([$_GET['id']]);

// Récupérer l'œuvre sous forme de tableau associatif
$o = $sqlquery->fetch(PDO::FETCH_ASSOC);

// Vérifier si l'œuvre est trouvée
if (!$o) {
    header('Location: index.php');
    exit;
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= ($o['image']) ?>" alt="<?= ($o['titre']) ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= ($o['titre']) ?></h1>
        <p class="description"><?= ($o['artiste']) ?></p>
        <p class="description-complete"><?= (($o['description'])) ?></p>
    </div>
</article>

<?php include('footer.php'); ?>