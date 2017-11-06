<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$promoName = htmlspecialchars($_POST['promoName']);
$aPromotion = new Promotion();

$aPromotionList = $aPromotion->getPromotionByTitle($promoName);
if(sizeof($aPromotionList)>0){
    $value = current($aPromotionList);
   
    $_SESSION['rabaisGlobal'] = $value['rabais'];
    echo "success";
}
else{
    $_SESSION['rabaisGlobal'] =0;
    echo "failure";
}

