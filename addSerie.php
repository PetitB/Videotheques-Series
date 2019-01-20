<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajout de série</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="navbar.css" type="text/css" />
</head>
<body>


<header>
    <div class="menu">
        <a href="index.php"> <img class="logo" src="resources/logo.jpg" alt="logo"></a>
        <input class="burger" type="checkbox" id="checkbox">
        <nav>
            <a href="index.php">| Liste des séries |</a>
            <a href="favoris.php">| Mes favoris |</a>
            <a href="addSerie.php">| Ajouter une série |</a>
        </nav>
    </div>
</header>


    <div>
        <h1 id="titre1"> Ajouter une série déjà prédéfinie :</h1>
        <form method="post" enctype="multipart/form-data" action="addSerie.php">
            <label>Vous pouvez choisir une série de la liste pour l'ajouter: </label>
            <select name="listePredef">
                <option value=""> Veuillez choisir une série </option>

            <?php
            require_once "functions.php";
            $listpredefinie = getListPredef();

            foreach ($listpredefinie as $value){
                ?>
                <option><?php echo $value['name'];}?></option>
            </select><br><br>
            <label> Ma note :</label>
            <select name="note">
                <option selected="selected">Pas d'avis</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>
            <label> Mon avis :</label>
            <textarea name="avis" placeholder="Mon avis sur cette série."></textarea><br><br>
            <label><input type="checkbox" name="fav">Ajouter aux favoris </label><br><br>
            <label><input type="submit" value="Ajouter à la liste"></label><br>
        </form>
    </div>

    <div id="form">
        <hr>
        <h1 id="titre2"> Ajouter une série non existante :</h1>
    <form method="post" enctype="multipart/form-data" action="addSerie.php">
        <label> Nom de la série : </label>
        <input type="text" name="name" required placeholder="Nom de la série"/><br><br>
        <label>Image de la série:</label>
        <input type="file" name="image" /><br><br>
        <label> Type de la série :</label>
        <select name="type" required>
            <option value=""> Veuillez choisir une genre </option>
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
        <label> Résumé de la série :</label>
        <textarea name="resume" placeholder="Le résumé de cette série."></textarea><br><br>
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
        <label> Mon avis :</label>
        <textarea name="avis" placeholder="Mon avis sur cette série."></textarea><br><br>
        <label><input type="checkbox" name="fav">Ajouter aux favoris </label><br><br>
        <label><input type="submit" value="Ajouter à la liste"></label><br>
    </form>
    </div>

</body>
</html>


<?php
require_once 'functions.php';
$videotheque = getLaVideotheque();
$size = count($videotheque);
$id = $size+1;

$serieNameListPredef = (isset($_POST['listePredef'])) ? $_POST['listePredef'] : "";
if ($serieNameListPredef) {
    echo addNewSerieViaPredef($serieNameListPredef);
}

$name = (isset($_POST['name'])) ? $_POST['name'] : "";
if($name!==""){
    if(isset($_FILES['image']['tmp_name'])) {
        $nameImage = $_FILES['image']['name'];
        if(move_uploaded_file($_FILES['image']['tmp_name'], 'image/'.$nameImage)) {
            $image = $nameImage;
        } else {
            echo " L'upload de l'image a échoué ! ";
        }
    }
    $resume = (isset($_POST['resume'])) ? $_POST['resume'] : false;
    $fav = (isset($_POST['fav'])) ? true : false;
    $type = (isset($_POST['type'])) ? $_POST['type'] : "";
    $nbSeason = (isset($_POST['nbSeason'])) ? $_POST['nbSeason'] : "";
    $note = (isset($_POST['note'])) ? $_POST['note'] : false;
    $avis = (isset($_POST['avis'])) ? $_POST['avis'] : false;
    echo addNewSerie(array('id' => $id,'name' => $name, 'type' => $type, 'resume' => $resume, 'fav' => $fav, 'nbSeason' => $nbSeason, 'image' => $image, 'note' => $note, 'avis' => $avis));
}
?>