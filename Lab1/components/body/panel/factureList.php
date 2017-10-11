<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/service.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/facture.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/promotion.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/TA_Promotion_Service.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/TA_Facture_Service.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/adresse.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/ville.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
//if admin
if(array_key_exists ( "currentUser" , $_SESSION)){
	if ($_SESSION ["currentUser"]->getAdministrateur()) {
		printFactureListAdmin();
	}
}

function getAllPayedFactures(){
	//Variables
	$aFacture = new Facture();
	$aFactureList = $aFacture->getListOfAllDBObjects();
	
	//complete facture object
	foreach($aFactureList as $tempFacture){
		//Default objects
		$aClient = new Client();
		$anAddress = new Adresse();
		$aFacturePayement = new TA_Facture_Service();
		$aPromotionService = new TA_Promotion_Service();
		$aService = new Service();
		$aPromotion = new Promotion();
		$aServiceList = array();
		$aVille = new Ville();
		$tempFacture['price']=0;
		
		//DB getters
		$aClient = $aClient->getObjectFromDB($tempFacture['fk_client']);		
		
		
		$anAddress= $anAddress->getObjectFromDB($aClient['fk_adresse']);		
		
		$aVille =  $aVille->getObjectFromDB($anAddress['fk_ville']);		
		$anAddress['ville'] = $aVille;
		$aClient['address'] = $anAddress;
		$tempFacture['client'] = $aClient;
		
		$aFacturePayementList = $aFacturePayement->getListOfAllDBObjectsWhere(" fk_facture ", " = ", $tempFacture['pk_facture']);
		
		//Get service for each facture
		if($aFacturePayementList!= null){
			if(sizeof($aFacturePayementList)>0){
				foreach($aFacturePayementList as $tempFacturePayement){
					$aServiceList[$tempFacturePayement['fk_service']] = $aService->getObjectFromDB($tempFacturePayement['fk_service']);
				}
				
			}
		}
		
		
		//Get promotion for each service
		foreach($aServiceList as $tempService){
			
			$aTempPromotionService = $aPromotionService->getListOfAllDBObjectsWhere(" fk_service ", " = ", $tempFacture['pk_facture']);
			
			
			
			if($aTempPromotionService != null){
				if(sizeof($aTempPromotionService)>0 ){
					foreach($aTempPromotionService as $localPS){
						$aLocalPromotion =$aPromotion->getObjectFromDB($localPS['fk_promotion']);
					
						$tempService['priceBefore'] =  $tempService['tarif'];
						$tempService['priceAfter'] =  $tempService['priceBefore'] *(1-$aLocalPromotion['rabais']);
						$tempFacture['price']=$tempService['priceBefore']+ ($tempFacture['price']- $tempService['priceAfter']);
						$aLocalPromotion['discount'] =  $tempService['priceBefore'] *(1-$aLocalPromotion['rabais']);
						$tempService['promotion'][] = $aLocalPromotion;
					}
					
				}else{
					$tempFacture['price']+= $tempService['tarif'];
				}
			}else{
				$tempFacture['price']+= $tempService['tarif'];
			}
			
			
			$aServiceList[$tempService['pk_service']] = $tempService;
		}
		
		$tempFacture['services'] = $aServiceList;
		
		//Setting new facture object
		
		$aFactureList[$tempFacture['pk_facture']] = $tempFacture;
	}
	//echo "<pre>";
	//print_r( $aFactureList);
	//echo "</pre>";
	return $aFactureList;
}


//print list of all factures
function printFactureListAdmin(){
	//get list of all TA_facture_service
	//(all payed factures)
	$aFactureList = getAllPayedFactures();
	
	foreach($aFactureList as $aFacture){
		echo getFactureComponentAdmin($aFacture);
	}
	
}



//Get html component for one facture
function getFactureComponentAdmin($aFacture){
	$totalPrice = 0;
	foreach($aFacture['services'] as $aService){
		$totalPrice +=$aService['tarif'];
	}
	
	$defaultComponent = "
<div style='width: 100%;max-width:850px; margin: auto;'>
	<h1 class='text-white'>&nbsp;</h1>

	<div class='box box-warning container'>
		<div>

			<div class='row'>
				<div class='text-red col-xs-2'>".$aFacture['pk_facture']."</div>
				<div class='float-right col-xs-4 float-right'><a  data-toggle='collapse' data-target='#facture".$aFacture['pk_facture']."' aria-expanded='false' class='collapsed text-black toggleFacture' ><u>".$aFacture['client']['prenom']." " .$aFacture['client']['nom'].  "</u></a></div>
				
				<div class='text-yellow col-xs-4'>".substr($aFacture['date_service'], 0, -8)."</div>
			<div class=' col-xs-2'></div>
			</div>
			<div  class='row'>
				<div class='text-blue  col-xs-2'></div>
				<div class='text-blue  col-xs-4'>".$aFacture['no_confirmation']."</div>
				<div class='text-blue col-xs-4 float-right'>".($totalPrice - $aFacture['price'])."$</div>
				<div class='text-blue col-xs-2 float-right'><a class='text-black ' href='javascript:void(0)'><span  data-toggle='collapse' data-target='#details".$aFacture['pk_facture']."'>Détail</span></a></div>
			</div>
<div id='facture".$aFacture['pk_facture']."'  class='collapse factureDetail' aria-expanded='false' style='height: 0px;'><span style='color:black;'>".$aFacture['client']['prenom']." " .$aFacture['client']['nom'].  "</span>
				<span style='color:blue;'>".$aFacture['client']['telephone']."</span><br><span style='color:orange;'>".$aFacture['client']['address']['no_civique']. " ".$aFacture['client']['address']['rue']." ,".$aFacture['client']['address']['ville']['ville'].", ".$aFacture['client']['address']['code_postal']."</span></div>
		</div>
		<div id='details".$aFacture['pk_facture']."' class='collapse'>";

	foreach($aFacture['services'] as $aService){
		$defaultComponent .= "<div  class='row'>
					<div class='text-blue  col-xs-2'></div>
					<div class='text-black col-xs-4'><small style='padding-left:25px;'>".$aService['service_titre']."</small></div>
					<div class='text-black col-xs-3'><small>".$aService['tarif']."$</small></div>
				</div>";
		if(isset($aService['promotion'])){
			$defaultComponent .= "<div  class='row'>
					<div class='text-red col-xs-2'></div>
					";
			if($aService['promotion'] != null){
				if(sizeof($aService['promotion']>0)){
					$i=0;
					foreach($aService['promotion'] as $tempPromo){
						if($i>0){
							$defaultComponent .="<div class='text-red col-xs-3'> </div>";
							$defaultComponent.="	<div class='text-red col-xs-4' style='padding-left:156px;'><small style='padding-left:25px;'>".$tempPromo['promotion_titre']."(".($tempPromo['rabais']*100)."%)</small></div>";
							$defaultComponent .= "<div class='text-red col-xs-3' style='padding-left:156px;'><small>-".($aService['priceBefore'] - $tempPromo['discount'])."$</small></div>";
							
						}else{
							$defaultComponent.="	<div class='text-red col-xs-4'><small style='padding-left:25px;'>".$tempPromo['promotion_titre']."(".($tempPromo['rabais']*100)."%)</small></div>";
							
							$defaultComponent .= "<div class='text-red col-xs-3'><small>-".($aService['priceBefore'] - $tempPromo['discount'])."$</small></div>";
							
						}
						$defaultComponent .="<div class='text-red col-xs-2'></div>";
						++$i;
					}
				}
			}
		
						//	$defaultComponent .= "<div class='text-red col-xs-3'><small>-".($aService['priceBefore'] - $aService['priceAfter'])."$</small></div>
			$defaultComponent .= "</div>";
		}
	}
	
	$defaultComponent .= "
		</div>
		<div>
			<p class='col-xs-9'></p>
			
		</div>
		</div>
	</div>
	</div>";
	
	
	return $defaultComponent;
}
