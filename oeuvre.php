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
    header('Location: error.php');
    exit;
}

// Récupérer l'ID de l'œuvre depuis l'URL et s'assurer qu'il est un entier
$id = intval($_GET['id']);

// Préparer et exécuter la requête pour récupérer l'œuvre correspondante
$sqlquery = $bdd->prepare('SELECT * FROM oeuvre WHERE oeuvre_id = ?');
$sqlquery->execute([$id]);

// Récupérer l'œuvre sous forme de tableau associatif
$o = $sqlquery->fetch(PDO::FETCH_ASSOC);

// Vérifier si l'œuvre est trouvée
if (!$o) {
    header('Location: error.php');
    exit;
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= htmlspecialchars($o['oeuvre_img'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($o['oeuvre_name'], ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($o['oeuvre_name'], ENT_QUOTES, 'UTF-8') ?></h1>
        <p class="description"><?= htmlspecialchars($o['oeuvre_artiste'], ENT_QUOTES, 'UTF-8') ?></p>
        <p class="description-complete"><?= nl2br(htmlspecialchars($o['oeuvre_desc'], ENT_QUOTES, 'UTF-8')) ?></p>
    </div>
</article>

<?php include('footer.php'); ?>