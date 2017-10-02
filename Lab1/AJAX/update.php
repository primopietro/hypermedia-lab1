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
}
else if($type == "TA_Promotion_Service"){
	$anObject = new TA_Promotion_Service();
	
	$anObject->updateObjectDynamically("date_debut",  htmlspecialchars ( $_POST ['date_debut']), $id);
	$anObject->updateObjectDynamically("date_fin",  htmlspecialchars ( $_POST ['date_fin']), $id);
	$anObject->updateObjectDynamically("code",  htmlspecialchars ( $_POST ['code']), $id);
	
}
