<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
require_once ('promotionList.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

//if admin
if(array_key_exists ( "currentUser" , $_SESSION)){
	if ($_SESSION ["currentUser"]->getAdministrateur()) {
		printAdmin();
	}
}

function printAdmin(){
	
	$content ="<div style='max-width:1000px;margin:auto;'><section class='content' >";
	$content .="<section class='content' style='    height: 50px !important;min-height: 50px;'><a  class='floatRight' id='addPromotion'>Ajouter une promotion</a></section>";
	
	$content .= getPromotionListAdmin();
	
	$content .= "<div class='col-xs-4'>
		<button type='submit' class='btn btn-primary btn-block btn-flat'
			style='float: right;'>Confirmer</button>
	</div><section></div>";
	echo $content;
}
function getPromotionComponent($aPromotion){
	$temp = $aPromotion['rabais']*100;
	$name = $aPromotion['promotion_titre'];
	$promotionComponent="<div class='box box-warning promotionItem' >
		<div class='col-xs-6'><input  value='$name'></div>
		<div class='col-xs-5'><input style='text-align:right' value='$temp'>%</div>
		<div class='input-group-btn' class='col-xs-1'>
			<button type='button' class='btn btn-warning dropdown-toggle'
				data-toggle='dropdown' aria-expanded='false'>

				<span class='fa fa-caret-down'></span>
			</button>
			<ul class='dropdown-menu'>
				<li><a href='#'>Appliquer à tous les services</a></li>
				<li><a href='#'>Modifier la promotion</a></li>
				<li><a href='#'>Supprimer la promotion</a></li>
			</ul>
		</div>
	</div>";
	
	return $promotionComponent;
}

function getPromotionList(){
	$aPromotion = new Promotion();
	$aPromotionList = $aPromotion->getListOfAllDBObjects();
	return $aPromotionList;
}

function getPromotionListAdmin(){
	//Get promotion list
	$aPromotionList = getPromotionList();
	$promotionComponents ="";
	//print for each component
	foreach($aPromotionList as $aPromotion){
		$promotionComponents .= getPromotionComponent($aPromotion);
	}
	return $promotionComponents;
}

?>