<?php



$modal="<!-- Modal -->
 <div class='modal fade' id='getCodeModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
   <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
       <div class='modal-body' id='getCode' >
          <div class='box box-warning promotionItem newobj' type='Promotion'>
		<div class='col-xs-6'><input name='titre' id='titrePromoNew' class='titrePromo ' placeholder='Nom'></div>
		<div class='col-xs-5'><input name='rabais' id='rabaisPromoNew' class='rabaisPromo  ' style='text-align:right' placeholder='0'>%</div>
		<a class='addObj'>Confirmer</a>
		</div>
       </div>
    </div>
   </div>
 </div>";

echo $modal;