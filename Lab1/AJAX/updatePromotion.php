<?php

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/adresse.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$aPromotion = new Promotion();
$promotion_titre = htmlspecialchars($_POST["titre"]);
$rabais = htmlspecialchars($_POST["rabais"]);




$aPromotion->setPromotion_titre($promotion_titre);
$aPromotion->setRabais($rabais);

$aPromotion>updateDBObject();

?>