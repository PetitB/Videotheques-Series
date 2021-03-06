<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma vidéothèque de séries</title>
    <link rel="stylesheet" media="screen" href="style.css"  type="text/css" />
    <link rel="stylesheet" href="navbar.css" type="text/css" />
</head>
<body>

    <header>
        <div class="menu">
            <a href="index.php"> <img class="logo" src="resources/logo.jpg" alt="logo"/></a>
            <input class="burger" type="checkbox" id="checkbox">
            <nav>
                <a href="index.php">| Liste des séries |</a>
                <a href="favoris.php">| Mes favoris |</a>
                <a href="addSerie.php">| Ajouter une série |</a>
            </nav>
        </div>
    </header>


    <div id="corps">
        <h1 id="titre"> Mes favoris :</h1>
    </div>


    <section id="containerFav">
        <?php
        require_once "functions.php";
        $videotheque = getLaVideotheque();
        //print_r($videotheque);
        foreach ($videotheque as $value) {
            if ($value['fav']) {
                ?>
                <a href="une_serie.php?id=<?php echo $value['id'] ?>">
                    <div class="serieFav">
                        <img class="imgSerieFav" alt="<?php echo $value['name']; ?>" src=<?php echo 'image/' . $value['image']; ?>>
                           <div class="infoSerieFav">
                        <p class="nomSerieFav"><?php echo $value['name']; ?></p> <p class='noteFav'><?php echo $value['note']; ?> /5</p>
                           </div>
                    </div>
                </a>
            <?php }
        } ?>
    </section>



</body>
</html>