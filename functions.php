<?php
/**
  * Récupère le contenu d'un fichier Json et le retourne.
  * @param $filePath String
  * @return $dataJson Object
  */
function getContentJson($filePath){
	$jsonFile = file_get_contents($filePath);
	$dataJson = json_decode($jsonFile,  true);
	return $dataJson;
}
/**
  * Ecrit dans le fichier Json la liste des séries.
  * @param $pathJsonFile String
  * @param $newContent Array
  * @return Boolean
  */
function setNewContentJson($pathJsonFile, $newContent){
	try {
		$fileOpen = fopen($pathJsonFile, "w+");
		fwrite($fileOpen,json_encode($newContent));
		fclose($fileOpen);
		return true;
	} catch (Exception $e) {
		return false;
	}
}
/**
  * Récupère la vidéothèque.
  * @return Array
  */
function getLaVideotheque(){
	$videotheque = getContentJson("videotheque.json");
	return isset($videotheque) ? $videotheque : [];
}


/**
 * Récupère la liste prédéfinie.
 * @return Array
 */
function getListPredef(){
    $listePredef = getContentJson("predef.json");
    return isset($listePredef) ? $listePredef : [];
}

/**
  * Ajoute une série dans le fichier Json
  * si elle n'existe pas déjà.
  * @param $serie Array
  * @return $message String
  */
function addNewSerie($serie){
	$videotheque = getLaVideotheque();
	$message = "La série existe déjà.";
	$verif = true;
	foreach ($videotheque as $value) {
		if ($value['name'] === $serie['name']) {
			$verif = false;
		}
	}
	if ($verif) {
		$videotheque[] = $serie;
		setNewContentJson("videotheque.json",$videotheque);
		$message = "La série a été ajouté avec succès.";
	}
	return $message;
}

/**
  * Ajoute une série via la liste prédéfinie de série dans le
  * fichier Json si elle n'existe pas déjà dans la vidéothèque.
  * On ne supprime pas la série de la liste prédéfinie car dans une
  * évolution possible, cette dernière peut servir à plusieurs utilisateurs.
  * @param $seriePredefName Array
  * @return $message String
  */
function addNewSerieViaPredef($seriePredefName){
	$videotheque = getLaVideotheque();
	$listePredef = getListPredef();
	$message = "La série est déjà ajouté dans la vidéothèque.";
	$verif = true;
	$laSeriePredef = [];
	foreach ($listePredef as $seriePredef) {
		if ($seriePredef['name'] === $serieName) {
			$laSeriePredef[] = $value;
		}
	}
	foreach ($videotheque as $serieVideotheque) {
		if ($serieVideotheque['name'] === $laSeriePredef['name']) {
			$verif = false;
		}
	}
	if ($verif) {
		$videotheque[] = $laSeriePredef;
		setNewContentJson("videotheque.json",$videotheque);
		$message = "La série a été ajouté avec succès.";
	}
	return $message;
}
/**
  * Récupère une liste des séries du
  * même type qu'indiqué en paramètre
  * et seulement celle non favorite.
  * @param $serieType String
  * @return $seriesOfSameType Array
  */
function getSeriesOfSameType($serieType) {
	$videotheque = getLaVideotheque();
	$listePredef = getListPredef();
	$seriesOfSameType = [];
	foreach ($videotheque as $value) {
		if ($value['type'] === $serieType && $value['fav'] !== true) {
			$seriesOfSameType[] = $value;
		}
	}
    foreach ($listePredef as $value) {
        if ($value['type'] === $serieType && $value['fav'] !== true) {
            $seriesOfSameType[] = $value;
        }
    }

	return $seriesOfSameType;	
}

/**
  * Change la note d'une série en fonction du nom,
  * voire aussi son avis s'il est précisé en paramètre.
  * @param $nomSerie String
  * @param $note String
  * @param $avis String
  * @return $message String
  */

function noteAndAddAvisSerie($nomSerie, $note, $avis = false){
	$videotheque[] = getLaVideotheque();
	$message = "Il y a eu une erreur.";
	foreach ($videotheque as $value) {
		if ($value['name'] === $nomSerie) {
			$value['note'] = $note;
			$message = "La série a été noté avec succès.";
			if ($avis) {
				$value['avis'] = $avis;
				setNewContentJson("videotheque.json",$videotheque);
				$message.="Et l'avis a bien été mis à jour.";
			}
		}
	}
	return $message;
}

// Pas d'HTML dans le PHP, dommage car en cas de modification d'une propriété
// ou autres, on doit modifier plusieurs fichiers HTML au lieu d'un fichier PHP.

/**
  * Retourne l'affichage HTML d'une liste de série
  * soit la vidéothèque entière, soit seulement les favoris.
  * @param $getOnlyFav Boolean
  * @return $affichage String
  */
/*function displayListSeries($getOnlyFav = false){
	$videotheque = getLaVideotheque();
	$affichage = "";
	foreach ($videotheque as $value) {
		if ($getOnlyFav && $value['fav']) {
			$affichage .= '<a href="une_serie.php?nameSerie='.$value['name'].'">';
			$affichage .= '<section class="serie" style='."'background-image:url(".'"image/'.$value['image'].'")'."'>";
			$affichage .= '<h1>'.$value['name'].'</h1></section></a>';
		}
		if (!$getOnlyFav) {
			$affichage .= '<a href="une_serie.php?nameSerie='.$value['name'].'">';
			$affichage .= '<section class="serie" style='."'background-image:url(".'"image/'.$value['image'].'")'."'>";
			$affichage .= '<h1>'.$value['name'].'</h1></section></a>';
		}
		$affichage = ($affichage === "") ? "Erreur lors de la récupération des données." : $affichage;
	}
	return $affichage;
}*/
/**
  * Retourne l'affichage HTML d'une série via son nom.
  * @param $nameSerie String
  * @return $affichage String
  */
/*function displaySerie($nameSerie){
	$videotheque[] = getLaVideotheque();
	$affichage = "Erreur lors de la récupération des données.";
	foreach ($videotheque as $value) {
		$affichage = '<div id="laSerie"><section style='."'background-image:url(".'"image/'.$value['image'].'")'."'>";
		$affichage .= '<h1>'.$value['name'].'<h1></section>';
		if ($value['fav']) {
			$checked = "checked";
		}
		$affichage .= '<input class="star" type="checkbox" name="fav" '.$checked.'>';
		$affichage .= '';
	}
	return $affichage;
}*/
/**
  * Retourne l'affichage HTML des favoris.
  * @return String
  */
/*function displayFav(){
	return displayListSeries(true);
}*/
?>