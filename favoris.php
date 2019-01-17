<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 16/01/2019
 * Time: 16:14
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ma vidéothèque de séries</title>
    <link rel="stylesheet" media="screen" href="style.css"  type="text/css" />
</head>
<body>

    <header>
        <img src="resources/logo.jpg" id="logo" alt="logo">

        <nav id="nav_menu">
            <ul>
                <li><a href="index.php">Liste des séries |</a></li>
                <li><a href="favoris.php">Mes favoris |</a></li>
                <li><a href="addSerie.php">Ajouter une série |</a></li>
            </ul>
        </nav>
    </header>


    <div id="corps">
        <h2 id="titre"> Mes favoris :</h2>
    </div>

    <div id="lesSeriesFav">

        <?php
        require_once "functions.php";
        $videotheque = getLaVideotheque();
        foreach ($videotheque as $value){
            if($value['fav']){?>
                <a href="une_serie.php?nameSerie=<?php echo $value['name']?>">
                    <section id="seriefav" style="background-color:url(<?php echo 'image/'.$value['image'];?>)">
                        <h2 id="titre_fav"><?php echo $value["name"]; ?></h2>
                    </section>
                </a>
        <?php
            }
        }
        ?>
    </div>




</body>
</html>