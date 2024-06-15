<?php
if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['image'])
|| strlen($_POST['description'])<3
||!filter_var($_POST['image'],FILTER_SANITIZE_URL) ) {

header('location:ajouter.php');
} else {
    //insert 
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);

    // insérer dans la bdd


    $req = $bdd->prepare('INSERT INTO oeuvre(title,description,artiste,image) VALUES(?,?,?,?)');
    $req->execute(array(
        'title' => $title,
        'description' => $description,
        'artiste' => $artiste,
        'image' => $image
    ));

header('location:oeuvre.php?id='.$bdd->lastInsertId());
}