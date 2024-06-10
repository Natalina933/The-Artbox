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
    <?php if ($o !== null): ?>
        <div id="img-oeuvre">
            <img src="<?= htmlspecialchars($o['image']); ?>" alt="<?= htmlspecialchars($o['titre']); ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?= htmlspecialchars($o['titre']); ?></h1>
            <p class="description"><?= htmlspecialchars($o['artiste']); ?></p>
            <p class="description-complete">
                <?= htmlspecialchars($o['description']); ?>
            </p>
        </div>
    <?php endif; ?>
</article>
</main>
<?php include('footer.php'); ?>
