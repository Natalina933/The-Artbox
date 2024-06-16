<?php
// Inclure le fichier de connexion à la base de données
include_once('bdd.php');

// Connexion à la base de données
$bdd = connexion();
if (!$bdd) {
    die('Erreur de connexion à la base de données');
}

// Vérifie si les champs obligatoires (titre, description, image) sont remplis,
// si la description a au moins 3 caractères et si l'URL de l'image est valide.
// Si une des conditions n'est pas remplie, la redirection vers la page 'test.php' est effectuée.
if (
    empty($_POST['oeuvre_name'])
    || empty($_POST['oeuvre_artiste'])
    || empty($_POST['oeuvre_img'])
    || strlen($_POST['oeuvre_desc']) < 3
    || !filter_var($_POST['oeuvre_img'], FILTER_VALIDATE_URL)
) {
    header('Location: test.php?erreur=true');
    exit;
} else {
    // Nettoie les données d'entrée pour éviter les injections de code.
    $title = htmlspecialchars($_POST['oeuvre_name']);
    $description = htmlspecialchars($_POST['oeuvre_desc']);
    $artiste = htmlspecialchars($_POST['oeuvre_artiste']);
    $image = htmlspecialchars($_POST['oeuvre_img']);

    try {
        // Prépare et exécute une requête SQL pour insérer les données dans la table 'oeuvre'.
        $req = $bdd->prepare('INSERT INTO oeuvre (oeuvre_name, oeuvre_desc, oeuvre_artiste, oeuvre_img) VALUES (?, ?, ?, ?)');
        $req->execute([$title, $description, $artiste, $image]);

        // Redirige vers la page 'oeuvre.php' avec l'ID de l'enregistrement nouvellement créé.
        header('Location: oeuvre.php?oeuvre_id=' . $bdd->lastInsertId());
        exit;
    } catch (PDOException $e) {
        echo 'Erreur d\'exécution de la requête : ' . $e->getMessage();
        exit;
    }
}
