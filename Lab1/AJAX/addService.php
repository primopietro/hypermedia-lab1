<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/service.php');

$aService = new Service();
$service_titre = htmlspecialchars($_POST["titre"]);
$description = htmlspecialchars($_POST["description"]);
$dure = htmlspecialchars($_POST["duree"]);
$tarif = htmlspecialchars($_POST["Tarif"]);
$actif = htmlspecialchars($_POST["actif"]);



$aService->setService_titre($service_titre);
$aService->setService_description($description);
$aService->setDuree($dure);
$aService->setTarif($tarif);
$aService->setActif($actif);


$aService>addDBObject();


?>