<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');

$aPromotion = new Promotion();
$promotion_titre = htmlspecialchars($_POST["titre"]);
$rabais = htmlspecialchars($_POST["rabais"]);



$aPromotion->setPk_promotion("NULL");
$aPromotion->setPromotion_titre($promotion_titre);
$aPromotion->setRabais($rabais);

$aPromotion>addDBObject();


?>