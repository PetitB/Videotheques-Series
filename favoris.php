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
    <link rel="stylesheet" href="style.css" type="text/css" />
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

<div id="titre"><h1>MES FAVORIS</h1></div>


<section id="container">
    <article id="serie">
    <a href="une_serie.php">
    <img src="resources/logo.jpg" alt="image serie">

    <div id="affiche">
    <h1>Très bonne série </h1>
    <p> 3 / 5</p></div>
    </a>
</article>

<article id="serie" >
    <a href="une_serie.php">
        <img src="resources/logo.jpg" alt="image serie">

        <div id="affiche">
            <h1>Très bonne série </h1>
            <p> 3 / 5</p></div>
    </a>
</article>

<article id="serie">
    <a href="une_serie.php">
        <img src="resources/logo.jpg" alt="image serie">

        <div id="affiche">
            <h1>Très bonne série </h1>
            <p> 3 / 5</p></div>
    </a>
</article>
</section>
