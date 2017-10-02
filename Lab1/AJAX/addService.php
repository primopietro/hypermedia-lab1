<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/service.php');

$anObject = new Service();
$title= htmlspecialchars ( $_POST ['titre'] );
$description= htmlspecialchars ( $_POST ['description'] );
$tarif= htmlspecialchars ( $_POST ['tarif'] );
$duree= htmlspecialchars ( $_POST ['duree'] );
$isActive= htmlspecialchars ( $_POST ['actif'] );
if($isActive == "on"){
    $isActive = 1;
}else{
    $isActive =0;
}
$photoName= htmlspecialchars ( $_POST ['fileToUpload'] );

$anObject->setActif($isActive);
$anObject->setService_titre($title);
$anObject->setService_description($description);
$anObject->setTarif($tarif);
$anObject->setDuree($duree);
$anObject->setImage($photoName);

$anObject->addDBObject ();

?>