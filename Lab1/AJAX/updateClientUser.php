<?php

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/adresse.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


$name = htmlspecialchars($_POST["Name"]);
$familyName = htmlspecialchars($_POST["familyName"]);
$nCivic = htmlspecialchars($_POST["nCivic"]);
$rue = htmlspecialchars($_POST["rue"]);
$CP = htmlspecialchars($_POST["CP"]);
$telephone = htmlspecialchars($_POST["telephone"]);
$email = htmlspecialchars($_POST["courriel"]);
$password = htmlspecialchars($_POST["password"]);

$anAdress = new Adresse();
$anAdress->setNo_civique($nCivic);
$anAdress->setRue($rue);
$anAdress->setCode_postal($CP);



$_SESSION["currentClient"]->setPrenom($name);
$_SESSION["currentClient"]->setNom($familyName);
$_SESSION["currentClient"]->setTelephone($telephone);
$_SESSION["currentUser"]->setCourriel($email);
$_SESSION["currentUser"]->setMot_de_passe($password);
 
$_SESSION["currentClient"]->updateDBObject();
$_SESSION["currentUser"]->updateDBObject();
?>