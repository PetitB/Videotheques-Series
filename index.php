<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ma vidéothèque de séries</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

    <header>
        <img src="resources/logo.jpg" id="logo" alt="logo">
        
        <nav id="nav_menu">
            <ul>
                <li><a href="index.php">Liste des séries |</a></li>
                <li><a href="favoris.php">Mes favoris |</a></li>
                <li><a href="addSerie.php">Ajouter une série</a></li>
            </ul>
        </nav>
    </header>
    <div id="lesSeries">
        <?php require_once "functions.php"; echo displayListSeries(); ?>        
    </div>
</body>
</html>