<?php
$type = htmlspecialchars ( $_POST ['type'] );

$anObject = null;
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/' . $type . '.php');
if ($type == "Promotion") {
	
	$anObject = new Promotion ();
	$name = htmlspecialchars ( $_POST ['name'] );
	$value = htmlspecialchars ( $_POST ['value'] );
	$value = $value/100;
	$anObject->setPromotion_titre($name);
	$anObject->setRabais($value);
}else if($type == "service"){
	$anObject = new Service();
	$title= htmlspecialchars ( $_POST ['title'] );
	$description= htmlspecialchars ( $_POST ['description'] );
	$tarif= htmlspecialchars ( $_POST ['tarif'] );
	$duree= htmlspecialchars ( $_POST ['duree'] );
	$isActive= htmlspecialchars ( $_POST ['isActive'] );
	if($isActive == "on"){
		$isActive = 1;
	}else{
		$isActive =0;
	}
	$photoName= htmlspecialchars ( $_POST ['photoName'] );
	
	$anObject->setActif($isActive);
	$anObject->setService_titre($title);
	$anObject->setService_description($description);
	$anObject->setTarif($tarif);
	$anObject->setDuree($duree);
	$anObject->setImage($photoName);
}
$anObject->addDBObject ();