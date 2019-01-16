<?php
/**
  * Récupère le contenu d'un fichier Json et le retourne
  * @param $filePath String
  * @return $dataJson Object
  */
function getContentJson($filePath){
	$jsonFile = file_get_contents($filePath);
	$dataJson = json_decode($jsonFile,  true);
	return $dataJson;
}
/**
  * Ecrit dans le fichier Json la liste des séries
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
function getLaVideotheque(){
	$videotheque = getContentJson("videotheque.json");
	return isset($videotheque) ? $videotheque : [];
}
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
function noteSerie($nomSerie, $note, $avis = false){
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
function displayListSeries($getOnlyFav = false){
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
}
function displaySerie($nameSerie){
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
}
function displayFav(){
	displayListSeries(true);
}
?>