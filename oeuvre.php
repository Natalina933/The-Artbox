<?php
include('oeuvres.php');

// Récupérer l'identifiant de l'œuvre depuis l'URL
$id = isset($_GET['id']) ? $_GET['id'] : null;//Cela assure que $id est défini et non nul

$o = null;
if ($id !== null) {
    foreach ($oeuvres as $oeuvre) {
        if ($id == $oeuvre['id']) { // Utilisation de == pour comparer les valeurs
            $o = $oeuvre;
            break;
        }
    }
}
?>
<article id="detail-oeuvre">
    <?php if ($o !== null) { ?>
        <div id="img-oeuvre">
            //htmlspecialchars est utilisé autour des variables qui sont utilisées dans le HTML pour s'assurer qu'aucun code malveillant ne peut être injecté
            <img src="<?= ($o['image']); ?>" alt="<?= ($o['titre']); ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?= ($o['titre']); ?></h1>
            <p class="description"><?= ($o['artiste']); ?></p>
            <p class="description-complete">
                <?= ($o['description']); ?>
            </p>
        </div>
    <?php } ?>
</article>
</main>
<?php include('footer.php'); ?>
