<?php
include('header.php');
include('bdd.php');

// Connexion à la base de données
$bdd = connexion();
if (!$bdd) {
    die('Erreur de connexion à la base de données');
}

// Vérifiez l'existence de la table oeuvres
try {
    // Exécution de la requête pour récupérer les œuvres
    $sqlquery = $bdd->query('SELECT * FROM oeuvre');
    $oeuvres = $sqlquery->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Gestion des erreurs en cas d'absence de la table
    die('Erreur : ' . $e->getMessage());
}
?>

    <div id="liste-oeuvres">
        <?php foreach ($oeuvres as $oeuvre) : ?>
            <article class="oeuvre">
                <a href="oeuvre.php?oeuvre_id=<?php echo $oeuvre['oeuvre_id'] ?>">
                    <img src="<?= $oeuvre['oeuvre_img'] ?>" alt="<?= $oeuvre['oeuvre_name'] ?>">
                    <h2><?= $oeuvre['oeuvre_name'] ?></h2>
                    <p class="description"><?= $oeuvre['oeuvre_artiste'] ?></p>
                </a>
            </article>
        <?php endforeach; ?>
    </div>
<?php include('footer.php'); ?>