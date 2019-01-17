<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ma vidéothèque de séries</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
    <body>

        <header>
            <img src="resources/logo.jpg" id="logo"  alt="logo">

            <nav id="nav_menu">
                <ul>
                    <li><a href="index.php">Liste des séries |</a></li>
                    <li><a href="favoris.php">Mes favoris |</a></li>
                    <li><a href="addSerie.php">Ajouter une série |</a></li>
                </ul>
            </nav>
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
                <a href="une_serie.php?nameSerie=<?php echo $value['name']?>">
                    <article class="serie">
                        <img alt=<?php echo "image/".$value["image"];?> src=<?php echo "image/".$value["image"];?>>
                        <div class="infoSerie">
                            <h2 class="nomSerie"><?php echo $value["name"]; ?></h2></div>
                    </article>
                </a>
            <?php } ?>
        </div>


    </body>
</html>