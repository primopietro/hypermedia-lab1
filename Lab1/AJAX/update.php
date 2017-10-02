<?php
$type = htmlspecialchars ( $_POST ['type'] );
$id = htmlspecialchars ( $_POST ['id'] );
$anObject = null;
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/' . $type . '.php');
if ($type == "Promotion") {
	
	$anObject = new Promotion ();
	$anObject->setPk_promotion ( $id );
	$anObject->setPromotion_titre ( htmlspecialchars ( $_POST ['name'] ) );
	$anObject->setRabais ( htmlspecialchars ( $_POST ['value'] ) );
	$anObject->updateDBObject ();
} else if ($type == "TA_Promotion_Service") {
	$anObject = new TA_Promotion_Service ();
	
	$anObject->updateObjectDynamically ( "date_debut", htmlspecialchars ( $_POST ['date_debut'] ), $id );
	$anObject->updateObjectDynamically ( "date_fin", htmlspecialchars ( $_POST ['date_fin'] ), $id );
	$anObject->updateObjectDynamically ( "code", htmlspecialchars ( $_POST ['code'] ), $id );
} else if ($type == "service") {
	$anObject = new Service ();
	
	$anObject->updateObjectDynamically ( "service_titre", htmlspecialchars ( $_POST ['title'] ), $id );
	$anObject->updateObjectDynamically ( "service_description", htmlspecialchars ( $_POST ['description'] ), $id );
	$anObject->updateObjectDynamically ( "tarif", htmlspecialchars ( $_POST ['tarif'] ), $id );
	$anObject->updateObjectDynamically ( "duree", htmlspecialchars ( $_POST ['duree'] ), $id );
	
	$isActive = htmlspecialchars ( $_POST ['isActive'] );
	if ($isActive == "on") {
		$isActive = 1;
	} else {
		$isActive = 0;
	}
	$anObject->updateObjectDynamically ( "actif", $isActive, $id );
	$anObject->updateObjectDynamically ( "image", htmlspecialchars ( $_POST ['photoName'] ), $id );
}