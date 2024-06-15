<?php
include('header.php');
// ?>

<body>
    <h1>Créer une nouvelle œuvre</h1>
    <form action="create_oeuvre.php" method="POST">
        <div class='champ-formulaire'>
            <label for="titre">Nom de l'œuvre:</label><br>
            <input type="text" id="titre" name="titre" required>
        </div>

        <div class="champ-formulaire">
            <label for="artiste">Nom de l'artiste:</label><br>
            <input type="text" id="artiste" name="artiste" required>
        </div>

        <div class="champ-formulaire">
            <label for="image">Lien vers la photo de l'œuvre:</label><br>
            <input type="text" id="image" name="image" required>
        </div>

        <div class="champ-formulaire">
            <label for="description">Description de l'œuvre:</label><br>
            <textarea id="description" name="description" required></textarea>
        </div>

        <input type="submit" value="Valider">
    </form>
</body>
</html>
<?php include('footer.php'); ?>
