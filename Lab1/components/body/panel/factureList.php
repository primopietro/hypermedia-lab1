<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/facture.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/promotion.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/TA_Promotion_Service.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/TA_Facture_Service.php');


if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

function getAllPayedFactures(){
	
}


//print list of all factures
function printFactureListAdmin(){
	//get list of all TA_facture_service
	//(all payed factures)
	getAllPayedFactures();
	//for each TA_facture_service
	
	//Get list of all promotions for this service with TA_Promotion_Service
	
	//Get final price for this facture
	
	//Get user for this facture
	
	//print getFactureComponentAdmin($aFacture)
}

//Get html component for one facture
function getFactureComponentAdmin($aFacture){
	
}
//Method for AJAX
function getFactureDetail($factureID){
	
}