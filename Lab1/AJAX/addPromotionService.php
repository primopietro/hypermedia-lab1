<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/TA_Promotion_Service.php');


$code = htmlspecialchars($_GET['code']);
$date_debut= htmlspecialchars($_GET['date_debut']) . " 00:00:00";
$date_fin= htmlspecialchars($_GET['date_fin']) . " 00:00:00";
$idPromotion= htmlspecialchars($_GET['idPromotion']);
$idService= htmlspecialchars($_GET['idService']);

$aPromotionService = new TA_Promotion_Service();
$aPromotionService->setCode($code);
$aPromotionService->setDate_debut($date_debut);
$aPromotionService->setDate_fin($date_fin);
$aPromotionService->setFk_service($idService);
$aPromotionService->setFk_promotion($idPromotion);
$aPromotionService->addDBObject();
