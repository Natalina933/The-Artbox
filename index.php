<?php
include('header.php');
include('bdd.php');

// Connexion à la base de données
$bdd = connexion();
if (!$bdd) {
    die('Erreur de connexion à la base de données');
}

// Exécution de la requête pour récupérer les œuvres
$sqlquery = $bdd->query('SELECT * FROM oeuvres');
$oeuvres = $sqlquery->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
    <div id="liste-oeuvres">
        <?php foreach ($oeuvres as $oeuvre) : ?>
            <article class="oeuvre">
                <a href="oeuvre.php?id=<?php echo $oeuvre['id'] ?>">
                    <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                    <h2><?= $oeuvre['titre'] ?></h2>
                    <p class="description"><?= $oeuvre['artiste'] ?></p>
                </a>
            </article>
        <?php endforeach; ?>
    </div>

</main>
<?php include('footer.php'); ?>
</body>
</html>