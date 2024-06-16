<?php
include('header.php');
?>

<div>
    <h1>Créer une nouvelle œuvre</h1>
    <form action="traitement.php" method="POST">
        <div class='champ-formulaire'>
            <label for="titre">Nom de l'œuvre:</label><br>
            <input type="text" id="titre" name="oeuvre_name" required>
        </div>

        <div class="champ-formulaire">
            <label for="artiste">Nom de l'artiste:</label><br>
            <input type="text" id="artiste" name="oeuvre_artiste" required>
        </div>

        <div class="champ-formulaire">
            <label for="image">Lien vers la photo de l'œuvre:</label><br>
            <input type="text" id="image" name="oeuvre_img" required>
        </div>

        <div class="champ-formulaire">
            <label for="description">Description de l'œuvre:</label><br>
            <textarea id="description" name="oeuvre_desc" required></textarea>
        </div>

        <input type="submit" value="Valider">
    </form>
</div>
<?php include('footer.php'); ?>