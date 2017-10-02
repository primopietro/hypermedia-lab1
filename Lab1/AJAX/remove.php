<?php
$type = htmlspecialchars ( $_POST ['type'] );
$id = htmlspecialchars ( $_POST ['id'] );
$anObject = null;
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/' . $type . '.php');
if ($type == "Promotion") {
	
	$anObject = new Promotion ();
	$anObject->removeDBObject ( $id );
} else if ($type == "Service") {
	$anObject = new Service ();
	$anObject= $anObject->updateObjectDynamically("actif", 0, $id);
}
else if ($type == "TA_Promotion_Service") {
	$anObject = new TA_Promotion_Service();
	$anObject->removeDBObject ( $id );
}
