<?php



$modal="<!-- Modal -->
 <div class='modal fade' id='getCodeModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
   <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
       <div class='modal-header'>
         <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
         <h4 class='modal-title' id='myModalLabel'> API CODE </h4>
       </div>
       <div class='modal-body' id='getCode' style='overflow-x: scroll;'>
          //ajax success content here.
       </div>
    </div>
   </div>
 </div>";

echo $modal;