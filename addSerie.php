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
        <input type="text" name="name" required placeholder="Nom de la série"/>
        <label>Image de la série:</label>
        <input type="file" name="image" value="0"/>
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
        </select>
        <label> Nombre de saison :</label>
        <input type="text" name="nbSeason" required value="1"/>
        <label> Ma note :</label>
            <select name="note">
                <option selected="selected">Pas d'avis</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        <textarea name="avis" placeholder="Mon avis sur cette série."></textarea>
        <label><input type="checkbox" name="fav">Ajouter aux favoris</label>
        <label><input type="submit" value="OK"></label>
    </form>
</body>
</html>
<?php
require_once 'functions.php';

$name = $_POST['name'];
if(isset($_FILES['image']['tmp_name'])) {
    $nameImage = $_FILES['image']['name'];
    if(move_uploaded_file($_FILES['image']['tmp_name'], 'image/'.$nameImage)) {
        $image = $nameImage;
    } else {
        echo "L'upload de l'image a échoué !";
    }
}
$fav = ($_POST['fav'] === NULL) ? false : true;
$type = $_POST['type'];
$nbSeason = $_POST['nbSeason'];
$note = ($_POST['note'] === "Pas d'avis") ? $_POST['note'] : false;
$avis = ($_POST['avis'] === "") ? $_POST['avis'] : false;
echo addNewSerie(array($name, $type, $fav, $nbSeason, $image, $note, $avis));
?>