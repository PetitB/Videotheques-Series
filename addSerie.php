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


<form method="post" enctype="multipart/form-data" action="functions.php">
    <label> Nom de la série : <input type="text" name="nom" required placeholder="Nom de la série"/></label>
    <label> Type de la série :
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
    </select></label>
    <label> Ma note :
        <select name="node" required>
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select></label>

    <textarea> </textarea>



    <label>Image de la série: <input type="file" name="image" /></label>

    <label><input type="checkbox" name="fav">Ajouter aux favoris</label>
    <label><input type="submit" value="OK"></label>
</form>



</body>
</html>