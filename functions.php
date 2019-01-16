<?php
require 'Videotheque.php';
require 'Serie.php';
/**
  * Récupère le contenu d'un fichier Json et le retourne
  * @param $filePath String
  * @return $dataJson Object
  */
public function getContentJson($filePath){
	$jsonFile = file_get_contents($filePath);
	$dataJson = json_decode($jsonFile);
	return $dataJson;
}
/**
  * Ecrit dans le fichier Json la liste des séries
  * @param $pathJsonFile String
  * @param $videotheque Object
  * @return Boolean
  */
public function setNewContentJson($pathJsonFile, $newContent){
	try {
		$fileOpen = fopen($pathJsonFile, "w+");
		fwrite($fileOpen,json_encode($newContent));
		fclose($fileOpen);
		return true;
	} catch (Exception $e) {
		return false;
	}
}
public function getLaVideotheque(){
	$videotheque = new Videotheque();
	$videotheque = getContentJson("videotheque.json");
	return $videotheque;
}
public function addNewSerie($serie){
	$videotheque = getLaVideotheque();
	$message = "La série existe déjà.";
	$foreach ($videotheque as $value) {
		if ($value->name === $serie->name) {
			$videotheque->add($serie);
			setNewContentJson("videotheque.json",$videotheque);
			$message = "La série a été ajouté avec succès.";
		}
	}
	return $message;
}
public function noteSerie($serie, $note, $avis = false){
	$videotheque = getLaVideotheque();
	$message = "Il y a eu une erreur.";
	$foreach ($videotheque as $value) {
		if ($value->name === $serie->name) {
			$value->note = $note;
			$message = "La série a été noté avec succès.";
			if ($avis) {
				$value->avis = $avis;
				setNewContentJson("videotheque.json",$videotheque);
				$message.="L'avis a bien été aussi pris en compte."
			}
		}
	}
	return $message;
}
public function displayListSeries($getOnlyFav = false){
	$videotheque = getLaVideotheque();
	$affichage = "Erreur lors de la récupération des données."
	foreach ($videotheque as $value) {
		if ($getOnlyFav && $value->fav) {
			$affichage = '<section class="serie" style='."'background-image:url(".'"image/'.$value->image.'")'."'>";
			$affichage .= '<h1>'.$value->name.'</h1></section>';
		}
		if (!$getOnlyFav) {
			$affichage = '<section class="serie" style='."'background-image:url(".'"image/'.$value->image.'")'."'>";
			$affichage .= '<h1>'.$value->name.'</h1></section>';
		}
	}
	return $affichage;
}
public function displaySerie($nameSerie){
	$videotheque = getLaVideotheque();
	$affichage = "Erreur lors de la récupération des données."
	foreach ($videotheque as $value) {
		$affichage = '<div id="laSerie"><section style='."'background-image:url(".'"image/'.$value->image.'")'."'>";
		$affichage .= '<h1>'.$value->name.'<h1></section>';
		$affichage .= '<input class="star" type="checkbox" name="fav" '.if($value->fav) {.'checked'.}.'>';
		$affichage .= '';
	}
	return $affichage;
}
public function displayFav(){
	displayListSeries(true);
}
?>