<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');

$id = htmlspecialchars($_POST['id']);
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
";


$modal .= "
				</div>
		
		</div>
		<div class='form-group has-feedback col-xs-7'>
			<p>Période de la promotion</p>
		</div>
		<div class='form-group has-feedback col-xs-3'>
			<input type='date' id='date_debutNew'/>
		</div>
		<div class='form-group has-feedback col-xs-1'>
			à
		</div>
		<div class='form-group has-feedback col-xs-3'>
			<input type='date' id='date_finNew'/>
		</div>
		<div class='form-group has-feedback col-xs-6'>
			<p>Entrer un code s'il est requis pour appliquer la promotion lors de
				la création de la facture.</p>
		</div>
		
		<div class='form-group has-feedback col-xs-6'>
			<input class='form-control' placeholder='codeNew' id='codePromotionNew' name='code'>
		</div>
		
		<div class='row'>
		
			<!-- /.col -->
			<div class='col-xs-6'>";
$modal .= "	<a  class='btn btn-primary btn-block btn-flat updateObj'
					style='float: right;' type='TA_Promotion_Service' idobj='".$id."'>Confirmer</a>";
$modal .= "</div>
		</div>
		
	</div>
</div>
	</div>
";

echo $modal;