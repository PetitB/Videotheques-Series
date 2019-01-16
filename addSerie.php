<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajout de série</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
    <header>
        <img src="resources/logo.jpg" id="logo">

        <nav id="nav_menu">
            <ul>
                <li><a href="index.php">Liste des séries |</a></li>
                <li><a href="addSerie.php">Mes favoris |</a></li>
                <li><a href="addSerie.php">Ajouter une série |</a></li>
            </ul>
        </nav>
    </header>


    <form method="post" enctype="multipart/form-data" action="addSerie.php">
        <label> Nom de la série : </label>
        <input type="text" name="name" required placeholder="Nom de la série"/><br><br>
        <label>Image de la série:</label>
        <input type="file" name="image" value="0"/><br><br>
        <label> Type de la série :</label>
        <select name="type" required>
            <option>Action/Aventure</option>
            <option>Animation</option>
            <option>Comédie</option>
            <option>Drame</option>
            <option>Fantastique</option>
            <option>Horreur</option>
            <option>Policier</option>
            <option>Romance</option>
            <option>Science fiction</option>
            <option>Suspens</option>
            <option>Thriller</option>
        </select><br><br>
        <label> Nombre de saison :</label>
        <input type="text" name="nbSeason" required value="1"/><br><br>
        <label> Ma note :</label>
            <select name="note">
                <option selected="selected">Pas d'avis</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select><br><br>
        <textarea name="avis" placeholder="Mon avis sur cette série."></textarea><br><br>
        <label><input type="checkbox" name="fav">Ajouter aux favoris </label><br><br>
        <label><input type="submit" value="Ajouter à la liste"></label><br>
    </form>

</body>
</html>


<?php
require_once 'functions.php';
$name = (isset($_POST['name'])) ? $_POST['name'] : "";
if($name!==""){
    if(isset($_FILES['image']['tmp_name'])) {
        $nameImage = $_FILES['image']['name'];
        if(move_uploaded_file($_FILES['image']['tmp_name'], 'image/'.$nameImage)) {
            $image = $nameImage;
        } else {
            echo "L'upload de l'image a échoué !";
        }
    }
    $fav = (isset($_POST['fav'])) ? true : false;
    $type = (isset($_POST['type'])) ? $_POST['type'] : "";
    $nbSeason = (isset($_POST['nbSeason'])) ? $_POST['nbSeason'] : "";
    $note = (isset($_POST['note'])) ? $_POST['note'] : false;
    $avis = (isset($_POST['avis'])) ? $_POST['avis'] : false;
    echo addNewSerie(array('name' => $name, 'type' => $type, 'fav' => $fav, 'nbSeason' => $nbSeason, 'image' => $image, 'note' => $note, 'avis' => $avis));   
}
?>