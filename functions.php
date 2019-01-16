<?php
public function getContentJson($filePath){
	$jsonFile = file_get_contents($filePath);
	$arrayPeople = json_decode($jsonFile);
	return $arrayPeople;
}
public function setNewContentJson($name, $series){
	try {
		$fileOpen = fopen($name, "w+");
		fwrite($fileOpen,json_encode($series));
		fclose($fileOpen);
		return true;
	} catch (Exception $e) {
		return false;
	}
}
public function addNewSerie($serie){
	
}
public function noteSerie($serie, $note, $avis = false){
	# code...
}
public function displayListSeries(){
	# code...
}
public function displayFav(){

}
?>