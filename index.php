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
        <h2 id="titre"> Liste des séries :</h2>
    </div>

    <div id="lesSeries">

    <?php
    require_once "functions.php";
	$videotheque = getLaVideotheque();
	//print_r($videotheque);
	foreach ($videotheque as $value){ ?>
        <a href="une_serie.php?nameSerie=<?php echo $value['name']?>">
            <section class="serie" style="background-image:url(<?php echo "image/".$value["image"];?>)">
                <h2><?php echo $value["name"]; ?></h2>
            </section>
        </a>
        <?php } ?>
    </div>



</body>
</html>