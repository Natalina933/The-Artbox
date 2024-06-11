<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
    $description = htmlspecialchars($_POST['description']);

    $sql = "INSERT INTO oeuvres (titre, artiste, image, description) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titre, $artiste, $image, $description]);

    echo "Nouvelle œuvre ajoutée avec succès";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle œuvre</title>
</head>
<body>
    <h1>Créer une nouvelle œuvre</h1>
    <form action="create_oeuvre.php" method="post">
        <label for="titre">Nom de l'œuvre:</label><br>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="artiste">Nom de l'artiste:</label><br>
        <input type="text" id="artiste" name="artiste" required><br><br>

        <label for="image">Lien vers la photo de l'œuvre:</label><br>
        <input type="text" id="image" name="image" required><br><br>

        <label for="description">Description de l'œuvre:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <input type="submit" value="Créer">
    </form>
</body>
</html>
