<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');

$idService = htmlspecialchars ( $_GET ['idobj'] );
$aPromotion = new Promotion ();
$aPromotionList = $aPromotion->getListOfAllDBObjects();
$modal = "<div class='modal fade' id='getCodeModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>


<div style='width: 700px; margin: auto;'>
	<h1 class='text-white'>&nbsp;</h1>
	<div class='box box-warning'>
		<div class='login-box-body'>

				<p class='14p'>Ajouter la période et un code pour appliquer la
					promotion choisie</p>
				<p class='text-red 10p'>Le code n'est pas obligatoire et ne sera
					pas exigé si la champs est vide.</p>
				<div class='col-xs-6 '
					style='border: 1px; border-style: solid; width: 40%;'>



					<h1 class='text-yellow'>
						<br>&ensp;&ensp;&ensp;
						<span id='promoValue'>";
if ($aPromotionList != null) {
	if (sizeof ( $aPromotionList ) > 0) {
		
		$counter = 0;
		foreach ( $aPromotionList as $aLocalPromotion ) {
			
			if ($counter > 0) {
				break;
			} else {
				$modal .= $aLocalPromotion ['rabais'] * 100;
			}
			$counter ++;
		}
	} else {
		$modal .= "0";
	}
} else {
	$modal .= "0";
}
$modal .= "%<br></span><br>
					</h1>

					
						<select id='aPromotion'>";

foreach ( $aPromotionList as $aLocalPromotion ) {
	$modal .= "<option idobj='".$aLocalPromotion ['pk_promotion']."' valuePromo='" . $aLocalPromotion ['rabais']*100 . "'>";
	
	$modal .= $aLocalPromotion ['promotion_titre'];
	
	$modal .= "</option>";
}

$modal .= "</select>
				</div>
		
		</div>
		<div class='form-group has-feedback col-xs-7'>
			<p>Période de la promotion</p>
		</div>
		<div class='form-group has-feedback col-xs-3'>
			<input type='date' id='date_debut'/>
		</div>
		<div class='form-group has-feedback col-xs-1'>
			à
		</div>
		<div class='form-group has-feedback col-xs-3'>
			<input type='date' id='date_fin'/>
		</div>
		<div class='form-group has-feedback col-xs-6'>
			<p>Entrer un code s'il est requis pour appliquer la promotion lors de
				la création de la facture.</p>
		</div>

		<div class='form-group has-feedback col-xs-6'>
			<input class='form-control' placeholder='code' id='codePromotion' name='code'>
		</div>

		<div class='row'>

			<!-- /.col -->
			<div class='col-xs-6'>";
if ($aPromotionList != null) {
	if (sizeof ( $aPromotionList ) > 0) {
		$modal .= "	<button type='submit' class='btn btn-primary btn-block btn-flat'
					style='float: right;' id='addPromotionBD' idobj='".$idService."'>Confirmer</button>";
	}
}

$modal .= "</div>
		</div>

	</div>
</div>
	</div>
";

echo $modal;