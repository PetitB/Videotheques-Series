<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Série</title>
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


<section id="infoUneSerie">
<?php
    require_once 'functions.php';
    $videotheque = getLaVideotheque();
    $listPredef = getListPredef();
    $serie= $_GET['id'];
    foreach ($videotheque as $value){
        if ($value['id'] == $serie){
    ?>  <h2><u><?php $nom = $value['name']; echo $nom ?></u></h2>
        <img alt="<?php echo $value['name']; ?>" src="<?php echo "image/" . $value["image"]; ?>" class="imgSerie"/>
        <p><u>Genre  </u>: <?php $type= $value['type']; echo $type; ?></p>
        <p><u>Résumé </u>: <?php echo $value['resume']; ?></p>
        <p><?php echo $value['nbSeason'] . ' '; ?> <?php if($value['nbSeason'] > 1) echo "saisons"; else echo "saison"; ?> </p>
        <?php if ($value['fav']); ?>

        <p><u>Mon avis </u>: <?php echo $value['avis']; ?></p>
        <p><u>Note</u> : <?php echo $value['note']; ?>/5</p>
        <?php }
        }

    foreach ($listPredef as $value){
        if ($value['id'] == $serie){
            ?>  <h2><u><?php $nom = $value['name']; echo $nom ?></u></h2>
            <img alt="<?php echo $value['name']; ?>" src="<?php echo "image/" . $value["image"]; ?>" class="imgSerie"></img>
            <p><u>Genre  </u>: <?php $type= $value['type']; echo $type; ?></p>
            <p><u>Résumé </u>: <?php echo $value['resume']; ?></p>
            <p><?php echo $value['nbSeason'] . ' '; ?> <?php if($value['nbSeason'] > 1) echo "saisons"; else echo "saison"; ?> </p>
            <?php if ($value['fav']); ?>

            <p><u>Mon avis </u>: <?php echo $value['avis']; ?></p>
            <p><u>Note</u> : <?php echo $value['note']; ?>/5</p>
        <?php }
    }
     ?>
</section>

<hr>
<h1 id="titre"> Séries du même type : </h1>
    <section id="container">
        <?php
        require_once "functions.php";
        $seriesSametype = getSeriesOfSameType($type);
        if(sizeof($seriesSametype) == 0){
            echo "Il n'y a pas de série du même type que " .$nom;
        }
        foreach ($seriesSametype as $value) {
            if ($value['id'] != $serie) {
                ?>
                <a href="une_serie.php?id=<?php echo $value['id'] ?>">
                    <article class="serie">
                        <img class="imgSerie" alt="image" src=<?php echo "image/" . $value["image"]; ?>>
                        <div class="infoSerie">
                            <h2 class="nomSerie"><?php echo $value["name"]; ?></h2></div>
                    </article>
                </a>

            <?php }
        }?>
    </section>
    <?php
    $favChgmnt = isset($_GET['favChgmnt']) ? $_GET['favChgmnt'] : "Aucun changement";
        if ($favChgmnt != "Aucun changement") {
            favOrNotFav($nom, $_GET('fav'));
        }
    ?>
</body>
</html>
