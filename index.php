<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma vidéothèque de séries</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="navbar.css" type="text/css" />
</head>
    <body>

<header>
        <div class="menu">
            <a href="index.php"> <img class="logo" src="resources/logo.jpg" alt="logo" /></a>
            <input class="burger" type="checkbox" id="checkbox">
            <nav>
                <a href="index.php">| Liste des séries |</a>
                <a href="favoris.php">| Mes favoris |</a>
                <a href="addSerie.php">| Ajouter une série |</a>
            </nav>
        </div>
</header>


        <div id="corps">
            <h1 id="titre"> Liste des séries :</h1>
        </div>



        <div id="container">
            <?php
            require_once "functions.php";
            $videotheque = getLaVideotheque();
            //print_r($videotheque);
            foreach ($videotheque as $value){ ?>
                <a href="une_serie.php?id=<?php echo $value['id']?>">
                    <article class="serie">
                        <img class="imgSerie" alt="image" src=<?php echo "image/".$value["image"];?>>
                        <div class="infoSerie">
                            <h2 class="nomSerie"><?php echo $value["name"]; ?></h2></div>
                    </article>
                </a>
            <?php } ?>
        </div>



    </body>
</html>