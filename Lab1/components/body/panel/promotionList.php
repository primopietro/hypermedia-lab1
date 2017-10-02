<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
require_once ('promotionList.php');

if (session_status () == PHP_SESSION_NONE) {
	session_start ();
}

// if admin
if (array_key_exists ( "currentUser", $_SESSION )) {
	if ($_SESSION ["currentUser"]->getAdministrateur ()) {
		printAdmin ();
	}
}
function printAdmin() {
	$content = "<div style='max-width:1000px;margin:auto;'><section class='content' ><form action='AJAX/updatePromotion.php' method='post'>";
	$content .= "<section class='content' style='    height: 50px !important;min-height: 50px;'><a  class='floatRight promotion' id='addPromotion'>Ajouter une promotion</a></section>";
	
	$content .= getPromotionListAdmin ();
	
	/*
	 * $content .= "<div class='col-xs-4'>
	 * <button id='buttonModificationPromo' type='submit' class='btn btn-primary btn-block btn-flat'
	 * style='float: right; style='display:block'>Confirmer</button></form>
	 * </div><section></div>";
	 * $content .= getPromotionForm();
	 */
	echo $content;
}
function getPromotionComponent($aPromotion) {
	$temp = $aPromotion ['rabais'] * 100;
	$name = $aPromotion ['promotion_titre'];
	$promotionComponent = "<div class='box box-warning promotionItem' id='promo" . $aPromotion ['pk_promotion'] . "'>
		<div class='col-xs-6'><input  name='titre'  class='titrePromo ' value='$name' ></div>
		<div class='col-xs-5'><input name='rabais' class='rabaisPromo  'style='text-align:right' value='$temp' >%</div>
		<div class='input-group-btn' class='col-xs-1'>
			<button type='button' class='btn btn-warning dropdown-toggle'
				data-toggle='dropdown' aria-expanded='false'>

				<span class='fa fa-caret-down'></span>
			</button>
			<ul class='dropdown-menu' >
				<li id='addAllPromotions' idobj='" . $aPromotion ['pk_promotion'] . "'><a >Appliquer a  tous les services</a></li>
				<li class='action' action='update' objtype='" . $aPromotion ['table_name'] . "' idobj='" . $aPromotion ['pk_promotion'] . "'><a >Modifier la promotion</a></li>
				<li class='action' action='remove' objtype='" . $aPromotion ['table_name'] . "' idobj='" . $aPromotion ['pk_promotion'] . "'><a >Supprimer la promotion</a></li>
			</ul>
		</div>
	</div>";
	
	return $promotionComponent;
}
function getPromotionList() {
	$aPromotion = new Promotion ();
	$aPromotionList = $aPromotion->getListOfAllDBObjects ();
	return $aPromotionList;
}
function getPromotionListAdmin() {
	// Get promotion list
	$aPromotionList = getPromotionList ();
	$promotionComponents = "";
	// print for each component
	if ($aPromotionList != null)
		if (sizeof ( $aPromotionList ) > 0)
			foreach ( $aPromotionList as $aPromotion ) {
				$promotionComponents .= getPromotionComponent ( $aPromotion );
			}
	return $promotionComponents;
}
function getPromotionForm() {
	$promotionForm = "<form action='AJAX/addPromotion.php' method='post'><div id='promotionForm' style='max-width:1000px;margin:auto; display:none;'><section class='content' ><div class='box box-warning promotionItem'>

		<div class='col-xs-6'><input  name='titre' placeholder='Nom'></div>
		<div class='col-xs-5'><input name='rabais' style='text-align:right' placeholder='Rabais'>%</div><br>
	</div>
<div class='col-xs-4' >
		<button type='submit' class='btn btn-primary btn-block btn-flat '
			style='float: right; '>Confirmer</button></form>
	</div><section></div></form>";
	
	return $promotionForm;
}

?>