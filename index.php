<body>
    <?php include('header.php');
    include('oeuvres.php');
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