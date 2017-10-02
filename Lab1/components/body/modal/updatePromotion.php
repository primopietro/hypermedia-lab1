<?php

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/Promotion.php');
$id = htmlspecialchars($_POST['id']);
$aPromotion = new Promotion();
$aPromotion = $aPromotion->getObjectFromDB($id);
$rabais = $aPromotion['rabais'];
$modal="<!-- Modal -->
 <div class='modal fade' id='getCodeModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
   <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
       <div class='modal-body' id='getCode' >
          <div class='box box-warning promotionItem newobj'>
		<div class='col-xs-6'><input name='titre' id='titrePromoNew' class='titrePromo ' value='".$aPromotion['promotion_titre']."'></div>
		<div class='col-xs-5'><input name='rabais' id='rabaisPromoNew' class='rabaisPromo  ' style='text-align:right' value='".$rabais."'></div>
		<a class='updateObj'  type='Promotion' idobj='".$aPromotion['pk_promotion']."' >Confirmer</a>
		</div>
       </div>
    </div>
   </div>
 </div>";

echo $modal;