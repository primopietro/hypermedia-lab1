<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/service.php');
require_once ($_SERVER["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');
require_once ($_SERVER["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/TA_Promotion_Service.php');

$sousTotal = 0;
$rabaisGlobal = 0;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    printCartList();
    global $rabaisGlobal;
    $rabaisGlobal = $_SESSION['rabaisGlobal'];
    if (sizeof($_SESSION["panier"]) > 0) {
        printDetails();
    } else {
        echo "<div class='row'>
			<div class='col-md-7 divCenter'><h1>Panier vide</h1></div></div>";
    }
}

function getServiceList()
{
    
    // Variables
    $aService = new Service();
    $serviceList = array();
    foreach ($_SESSION["panier"] as $item) {
        $aLocalService = $aService->getObjectFromDB($item);
        $serviceList[$item] = $aLocalService;
    }
    
    return $serviceList;
}

function printPromo(){
    echo "<div class='col-md-5'>";
    echo "<div style='border:3px solid orange;overflow: hidden;'>";
    echo "Entrez le code promotionel pour avoir un rabais promotionnel";
    echo "<input name='rabaisPromo' id='rabaisPromo'><br> <a style='float:right;' id='validerPromos'>Valider</a>";
    
    echo "</div>";
    echo "</div><div class='col-md-2'></div>";
}

function printCosts()
{
    global $sousTotal;
    global $rabaisGlobal;
    
  
    if ($sousTotal < 0) {
        $sousTotal = 0;
    }
    $rabaisLocal = $sousTotal*$rabaisGlobal;
    $total = $sousTotal - $rabaisLocal;
    if ($total < 0) {
        $total = 0;
    }
    $sousTotal = round($sousTotal, 2);
    $rabaisLocal = round($rabaisLocal, 2);
    $total = round($total, 2);
    
    echo "<div class='col-md-5' style='text-align:right;'>";
    echo "<span style='text-align:right'>Sous total : " . $sousTotal . "$</span><br>";
    echo "<span style='text-align:right;color:red;'>Rabais aditionnel : " . $rabaisLocal . "$</span><br>";
    echo "<span style='text-align:right'>Total : " . $total . "$</span><br>";
    echo "<a id='paypal-button-container'></a>";
    $_SESSION['tobePayed'] = $total;
    
    
    echo "<script>
        paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AbqiBRxV2VPk5hvvyy-Lk3sfSnXZa4hRsGQIBmc-PQdK6Ob7Yf_Hpog5tD2WrVxAVehYB7GLibzncPb0',
                production: 'AbqiBRxV2VPk5hvvyy-Lk3sfSnXZa4hRsGQIBmc-PQdK6Ob7Yf_Hpog5tD2WrVxAVehYB7GLibzncPb0'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '".$total."', currency: 'USD' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    swal('Success',
						    'Achat reussi',
						    'success').then(function () {
			
		               document.location.href='/';
		  
            		}, function (dismiss) {
            		 
            		});
                });
            }

        }, '#paypal-button-container');

    </script>";
    echo "</div>";
}

function printDetails()
{
    echo "<div class='row'><div class='col-md-7 divCenter'>";
    printPromo();
    printCosts();
    echo "</div ></div >";
}

function printCartList()
{
    $serviceList = getServiceList();
    foreach ($serviceList as &$service) {
        echo getCatalogComponent($service);
    }
}

function getPromosHtml($aService)
{
    $html = "";
    $promotions = getPromos($aService);
    
    global $sousTotal;
    $sousTotal += $aService['tarif'];
    foreach ($promotions as $aPromotion) {
        $sousTotal -= $aService['tarif'] * $aPromotion['rabais'];
        $html .= getPromoHtml($aService, $aPromotion);
    }
    
    return $html;
}

function getPromoHtml($aService, $aPromotion)
{
    $html = "";
    
    $html .= "<div class='col-md-7' style='text-align:left;color:red;'>
    <span>" . $aPromotion['promotion_titre'] . "(" . ($aPromotion['rabais'] * 100) . ")% </span>
        </div>";
    $html .= "<div class='col-md-2' style='text-align:right;color:red;'>
    <span> -" . $aService['tarif'] * $aPromotion['rabais'] . "$ </span>
        </div>";
    
    return $html;
}

function getPromos($aService)
{
    $aPS = new TA_Promotion_Service();
    $aPromotion = new Promotion();
    $aPromotionList = array();
    $aPSList = $aPS->getListOfAllDBObjectsWhere("fk_service", " = ", $aService['pk_service']);
    if ($aPSList != null) {
        if (sizeof($aPSList) > 0) {
            foreach ($aPSList as $aLocalPS) {
                $today = date("Y-m-d H:i:s");
                
                if ($aLocalPS['date_debut'] <= $today && $today <= $aLocalPS['date_fin']) {
                    $aLocalPromotion = $aPromotion->getObjectFromDB($aLocalPS['fk_promotion']);
                    $aPromotionList[$aLocalPS['fk_promotion']] = $aLocalPromotion;
                }
            }
        }
    }
    
    return $aPromotionList;
}

function getCatalogComponent($aService)
{
    if ($aService['image'] == null) {
        $aService['image'] = "image-not-found.gif";
    }
    
    $markup = "";
    if ($aService['actif'] == "1" || $aService['actif'] == 1) {
        $markup = "<div class='row'>
			<div class='col-md-7 divCenter'>
				<div class='box'>
					<div class='box-header with-border'>
						<h3 class='box-title'>" . $aService['service_titre'] . "</h3>
								
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
						<div class='col-md-2'><img class='img-responsive'  src='images/services/" . $aService['image'] . "'></div>
							<div class='col-md-5'>
								<h2>" . $aService['service_titre'] . " </h2>
    							
							</div>
                            <div class='col-md-5' style='text-align:right;padding-top:25px;'>
								<span class='text-blue' style='    padding-right: 55px;'>Tarif : " . $aService['tarif'] . "$ </span>   							
							</div>
                            <div class='row'>";
        $markup .= getPromosHtml($aService);
        $markup .= "</div>
                            <div class='row'>
            						<div class='col-md-11 textBot' ></div>
                                    <div class='col-md-1 textBot' ><a  href='javascript:void(0)' idobj='" . $aService['pk_service'] . "' class='retirerPanier'>Retirer</a></div>
            				</div>
						</div>
            								
					</div>
            								
					<!-- ./box-body -->
            								
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->";
        
        $markup .= "</div>";
    }
    
    return $markup;
}