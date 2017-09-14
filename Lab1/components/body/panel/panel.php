<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
require_once ('catalogList.php');
require_once ('serviceList.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

//if admin
if(array_key_exists ( "currentUser" , $_SESSION)){
	if ($_SESSION ["currentUser"]->getAdministrateur()) {
		printAdmin();
	}
	else{
		printUserOrViewer();
	}
}
//else if regular user or viewer
else{
	printUserOrViewer();
}
function printAdmin(){
	$content ="<div style='max-width:1000px;margin:auto;'><section class='content'>";
	$content .="<a href='#' class='floatRight'>Ajouter un service</a>";
	$content .= printServiceListAdmin();
	
	$content .= "<section></div>";
	echo $content;
}
function printUserOrViewer(){
	
	$content ="<section class='content'>";
	printCatalogList();
	
	$content .= "<section>";
	echo $content;
}
?>