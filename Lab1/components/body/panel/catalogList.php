<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/service.php');


if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

function getServiceList(){
	
	//Variables
	$aService = new Service();
	
	//Methods
	$serviceList = $aService->getListOfAllDBObjects();
	
	return $serviceList;
}

function printCatalogList(){
	$serviceList = getServiceList();
	foreach ($serviceList as &$service) {
		echo getCatalogComponent($service);
	}
}

function getCatalogComponent($aService){
	if($aService['image'] == null){
		$aService['image'] = "image-not-found.gif";
	}
	
	$markup = "";
	if($aService['actif'] == "1" || $aService['actif'] == 1){
		$markup = "<div class='row'>
			<div class='col-md-7 divCenter'>
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
							</button>
						</div>
					</div>
								
					<div class='box-body'>
						<div class='row'>
						<div class='col-md-2'><img class='img-responsive'  src='images/services/".$aService['image']."'></div>
							<div class='col-md-10'>
								".$aService['service_description']."
    							<div class='row'>
            						<div class='col-md-6  textBot'><span class='text-blue'>Tarif:".$aService['tarif']."</span></div>
            						<div class='col-md-5 textBot' ><span class='text-orange'>Durée:".$aService['duree']."h</span></div>
                                    <div class='col-md-1 textBot' ><a  href='javascript:void(0)' nom='".$aService['service_titre']."' prix='".$aService['tarif']."' idobj='".$aService['pk_service']."' class='buyItem'><img class='img-responsive '  style='max-width:25px;' src='images/icones/panier'></a></div>
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