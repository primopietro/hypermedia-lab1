<?php

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/service.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/TA_Promotion_Service.php');

$idPromotion = htmlspecialchars($_POST['id']);
$dateDebut = htmlspecialchars($_POST['date_debut']);
$dateFin = htmlspecialchars($_POST['date_fin']);
$code = htmlspecialchars($_POST['code']);
$aService = new Service();
$aServiceList = $aService->getListOfAllDBObjects();

foreach($aServiceList as $aLocalService){
	$aLocalTAPS = new TA_Promotion_Service();
	
	$aLocalTAPS->setFk_promotion($idPromotion);
	$aLocalTAPS->setFk_service($aLocalService['pk_service']);
	$aLocalTAPS->setDate_fin($dateFin);
	$aLocalTAPS->setDate_debut($dateDebut);
	$aLocalTAPS->setCode($code);
	$aLocalTAPS->addDBObject();
}
