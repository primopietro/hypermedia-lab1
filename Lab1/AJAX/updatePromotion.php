<?php

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$aPromotion = new Promotion();
$idPromotion = htmlspecialchars($_GET["id"]);
$promotion_titre = htmlspecialchars($_GET["titre"]);
$rabais = htmlspecialchars($_GET["rabais"]);



$aPromotion->setPk_promotion($idPromotion);
$aPromotion->setPromotion_titre($promotion_titre);
$aPromotion->setRabais($rabais);

$aPromotion->updateDBObject();

?>