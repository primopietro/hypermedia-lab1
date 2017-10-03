<?php



$modal="<div class='modal fade' id='getCodeModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>


<div style='width: 700px; margin: auto;'>
	<h1 class='text-white'>&nbsp;</h1>
	<div class='box box-warning newobj' type='service'>
		<div class='login-box-body'>


       <p class='14p'>Compléter ce formulaire pour ajouter un nouveau service</p>
       <p class='text-red 10p'>Tous les champs sont obligatoires</p>
       <div class='col-xs-4' style='border:solid 1px'>
       		<img src='images/services/cours.gif' width='100%' style='border:solid 1px' >
       		<p >Mettre à jour la photo</p>
       		
       		 <input type='file' name='fileToUpload' id='photoNew'>
       </div>
     <div class='form-group has-feedback col-xs-8'>
        <input id='titreNew' class='form-control' placeholder='Titre' name='titre'>
      </div>
       <div class='form-group has-feedback col-xs-8'>
        <input id='descriptionNew' class='form-control' placeholder='Description' name='description'>
      </div>
      <div class='form-group has-feedback col-xs-4'>
        <input id='dureeNew' class='form-control' placeholder='Durée' name='duree'>
      </div>
      
      <div class='form-group has-feedback col-xs-4'>
        <input id='tarifNew' class='form-control' placeholder='Tarif' name='Tarif'>
      </div>
     
      <div class='row'>
        <div class='col-xs-8'>
        <div class='checkbox'>
                  <label class='text-blue'>
                    <input id='actifNew' type='checkbox' name='actif' >Activer le service dans le catalogue
                  </label>
                </div>
         
        </div>
        <!-- /.col -->
        <div class='col-xs-6'>
          <a  class='btn btn-primary btn-block btn-flat addObj' style='float:right;'>Confirmer</a>
        </div>
      </div>
      
    </div></div></div>";

echo $modal;