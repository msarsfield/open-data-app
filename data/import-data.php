<?php 

/**
  *To load gardens data set into the app
  *
  *@package com.marysarsfield.open-data-app
  *copyright 2012
  *@author Mary Sarsfield <msarsfield@rogers.com>
  *@link http://msarsfield.github.com/open-data-app/
  *@license New BSD License <https://github.com/msarsfield/open-data-app/blob/master/copyright_license.txt>
  *version 1.0.0
  */

require_once '../includes/db.php'; 

$places_xml = simplexml_load_file('community-gardens.kml');

$sql = $db->prepare('
	INSERT INTO gardens (name, street_address, longitude, latitude)
	VALUES (:name, :street_address, :longitude, :latitude)
	
	');

//var_dump($places_xml); 

foreach ($places_xml->Document->Folder[0]->Placemark as $place) {
//	echo $place->name;	
//	echo $place->Point->coordinates;
	
	$coords = explode(',', trim($place->Point->coordinates));
	//var_dump($coords);
	
//	 echo $places->name;
	//$coords = explode(',', trim($place->Point->coordinates));
	$adr = '';
	
	

	foreach ($place->ExtendedData->SchemaData->SimpleData as $civic) {
		var_dump($civic);
			if ($civic->attributes()->name =='LEGAL_ADDR') {
				$adr = $civic;
				
			}
	}
	
//	echo $adr;

	$sql->bindValue(':name', $place->name, PDO::PARAM_STR);
	$sql->bindValue(':street_address', $adr, PDO::PARAM_STR);
	$sql->bindValue(':longitude', $coords[0], PDO::PARAM_STR);
	$sql->bindValue(':latitude', $coords[1], PDO::PARAM_STR);
	$sql->execute();
	
	
}
var_dump($sql->errorInfo());