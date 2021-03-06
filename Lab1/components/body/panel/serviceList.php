<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/service.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/TA_Promotion_Service.php');
require_once ('catalogList.php');


if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if(isset($_GET['printList'])){
	if($_GET['printList']=="true"){
		printServiceListAdmin();
	}
	else{
		echo "fail";
	}
	
}
function getServiceListAdmin(){
	
	//Variables
	$aService = new Service();
	
	//Methods
	$serviceList = $aService->getListOfAllDBObjects();
	
	return $serviceList;
}
function getPromotionsForService($aService){
	
	//Variables
	$aPromotionListForService = array();
	$aServicePromotion = new TA_Promotion_Service();
	$aPromotion = new Promotion();
	
	//Methods
	$aPromotionServiceList = $aServicePromotion->getListOfAllDBObjectsWhere("fk_service", " = ", $aService['pk_service']);
	if($aPromotionServiceList != null){
		if(sizeof($aPromotionServiceList)>0){
			foreach($aPromotionServiceList as $aPromotionService){
				$promotionTemp = $aPromotion->getObjectFromDB($aPromotionService['fk_promotion']);
				$promotionTemp['start_date'] = $aPromotionService['date_debut'];
				$promotionTemp['finish_date'] = $aPromotionService['date_fin'];
				$promotionTemp['code'] = $aPromotionService['code'];
				$promotionTemp['pk_promotion_service'] =  $aPromotionService['pk_promotion_service'];
				$aPromotionListForService[$promotionTemp['pk_promotion']] = $promotionTemp;
			}
		}
	}
	
	return $aPromotionListForService;
}
function printServiceListAdmin(){
	$serviceList = getServiceList();
	$serviceListString = "";
	if($serviceList!=null){
		if(sizeof($serviceList)>0){
			foreach ($serviceList as &$service) {
				$promotionsForService = getPromotionsForService($service);
				$serviceListString .= getServiceComponentAdmin($service,$promotionsForService);
			}
		}
	}
	
	return $serviceListString;
}
function getServiceComponentAdmin($aService,$aPromotionList){
	if($aService['image'] == null){
		$aService['image'] = "image-not-found.gif";
	}
	
	$markup = "";
	if($aService['actif'] == "1" || $aService == 1 ){
		$markup = "<div class='row'>
			<div class='col-md-12'>
				<div class='box'>
					<div class='box-header with-border'>
						<h3 class='box-title'>".$aService['service_titre']."</h3>
								
						<div class='box-tools pull-right'>
							<button type='button' class='btn btn-box-tool'
								data-widget='collapse'>
								<i class='fa fa-minus'></i>
							</button>
							<button type='button' class='btn btn-box-tool'
								data-widget='remove'>
								<i class='fa fa-times'></i>
							</button>";
		$markup.= getModifyServiceButton($aService);
		$markup.="			</div>
					</div>
				
					<div class='box-body'>
						<div class='row'>
						<div class='col-md-2'><img class='img-responsive' src='images/services/".$aService['image']."'></div>
							<div class='col-md-10'>".$aService['service_description']."
    							<div class='row'>
            						<div class='col-md-6'><span class='text-blue'>Tarif:".$aService['tarif']."</span></div>
            						<div class='col-md-6'><span class='text-orange'>Durée:".$aService['duree']."h</span></div>
            					</div>
							</div>
						</div>
									<div class='row'>
									<div class='col-md-3'>
										<a href='#'> Promotions :</a>
									</div>
									<div class='col-md-9'>
										<div class='row'>";
		
		foreach($aPromotionList as $aPromotion){
			
			$markup .=getModifyPromotionComponent($aPromotion);
			
		}
		$markup.="<div class='col-md-2'>
												<a style='color:blue;font-size:60px;' class='addPromotionService' idobject='".$aService['pk_service']."'>+</a>
											</div>
											<div class='col-md-2 floatRight'>
												<img class='img-responsive' src='images/icones/medias_sociaux.jpeg'>
											</div>
										</div>
									</div>
								</div>
					</div>
														
														
					<!-- ./box-body -->
														
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>";
	}
	
	
	return $markup;
}
function getModifyServiceButton($aService){
	$button ="
	<div class='input-group-btn' class='col-xs-1' style='    display: block;
    float: right;
    transform: translatey(-5px) translatex(-23px);z-index:100'>
	<button type='button' class='btn btn-warning dropdown-toggle'
			data-toggle='dropdown' aria-expanded='false' style='opacity:0.7;'>
			
			<span class='fa fa-caret-down'></span>
	</button>
			<ul class='dropdown-menu' style='transform: translatex(34px) translatey(-3px);'>
	<li class='action' action='update' objtype='".$aService['table_name']."' idobj='".$aService['pk_service']."'><a >Modifier le service</a></li>
	<li class='action' action='remove' objtype='".$aService['table_name']."' idobj='".$aService['pk_service']."'><a >Desactiver le service</a></li>
			</ul>
	</div>";
	
	return $button;
}
function getModifyPromotionComponent($aPromotion){
	$tempValPromo = $aPromotion['rabais']*100;
	$startDate = $aPromotion['start_date'];
	$endDate = $aPromotion['finish_date'];
	$code = $aPromotion['code'];
	$markup ="<div class='col-md-2'>
	<div class='box'>
	<div class='input-group-btn' class='col-xs-1' style='z-index:100;transform: translatey(0px) translatex(55px);
	position: absolute;'>
	<button type='button' class='btn btn-warning dropdown-toggle'
	data-toggle='dropdown' aria-expanded='false' style='opacity:0.7;'>
	
	<span class='fa fa-caret-down'></span>
	</button>
	<ul class='dropdown-menu'>
	<li class='action' action='update' objtype='TA_Promotion_Service' idobj='".$aPromotion['pk_promotion_service']."'><a >Modifier la promotion</a></li>
	<li class='action' action='remove' objtype='TA_Promotion_Service' idobj='".$aPromotion['pk_promotion_service']."'><a>Supprimer la promotion</a></li>
	</ul>
	</div>
	<div class='promoVal'>$tempValPromo %</div>
	<div class='hoverDates'>Debut : $startDate fin : $endDate</div>
	<div class='promoCode'>$code</div>
	</div>
	</div>";
	
	return $markup;
}
