<?php



$modal="<!-- Modal -->
 <form name='formAddPromo' action='AJAX/addPromotion.php'  onsubmit='return validatePromotionForm()'  method='post'>
 <div class='modal fade' id='getCodeModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
   <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
       <div class='modal-body' id='getCode' >
          <div class='box box-warning promotionItem newobj' type='Promotion'>
		<div class='col-xs-6'><input name='titre' id='titrePromoNew' class='titrePromo ' placeholder='Nom' required></div>
		<div class='col-xs-5'><input name='rabais' id='rabaisPromoNew' class='rabaisPromo  ' style='text-align:right' placeholder='0'required>%</div>
		 <br>
		</div>
        <div class='col-xs-3'><button type='submit' class='btn btn-primary btn-block btn-flat' style='float:right;'>Confirmer</button><div>
       </div>
    </div>
   </div>
 </div>
</form>
";

echo $modal;