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
}
$anObject->addDBObject ();