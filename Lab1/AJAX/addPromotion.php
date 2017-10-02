<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');

$anObject = new Promotion ();
$name = htmlspecialchars ( $_POST ['titre'] );
$value = htmlspecialchars ( $_POST ['rabais'] );
$value = $value/100;
$anObject->setPromotion_titre($name);
$anObject->setRabais($value);

$anObject->addDBObject ();
?>