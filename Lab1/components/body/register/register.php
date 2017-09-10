<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


$form = "<div style='width:500px;margin:auto;'>
<h1 class='text-white'> &nbsp;
</h1>
<div class='box box-warning'>
           <div class='login-box-body'>
 

    <form action='../../index2.html' method='post'>
       <p class='14p'>Remplissez ce formulaire pour créer votre profil</p>
       <p class='text-red 10p'>Tous les champs sont obligatoire</p>
   <div class='form-group  col-md-6 '>
        <input class='form-control' placeholder='Name' name='Name'>
      </div>
     <div class='form-group  col-md-6 '>
        <input class='form-control' placeholder='Family Name' name='familyName'>
      </div>
      <div class='form-group  col-md-3 '>
        <input class='form-control' placeholder='No Civic' name='nCivic'>
      </div>
      
      <div class='form-group  col-md-3 '>
        <input class='form-control' placeholder='Street' name='rue'>
      </div>
     <div class='form-group  col-md-6 '>
       <select class='form-control' name='ville' id='ville'>
           <option value='sherbrooke'>Sherbrooke</option>
           <option value='magog'>Magog</option>
           <option value='montreal'>Montreal</option>
           <option value='quebec'>Québec</option>
           <option value='lennoxville'>Lennoxville</option>
           <option value='levis'>Levis</option>

       </select>
      </div>
      <div class='form-group  col-md-6 '>
        <input class='form-control' placeholder='Postal Code ' name='CP'>
      </div>
      <div class='form-group  col-md-6 '>
        <input class='form-control' placeholder='telephone' name='telephone'>
      </div>
         <p class='14p'>Votre courriel servira à vous identifier lors de votre prochaine visite</p>
         <p class='text-red 10p'>Le mot de passe doit avoir au moin 1 chiffre, 1 lettre et 8 caractere minimum</p>
    <div class='form-group  col-md-6 '>
        <input class='form-control' placeholder='Email' type='email'>
      </div>
      <div class='form-group  col-md-6 '>
        <input class='form-control' placeholder='Confirm email' type='email'>
      </div>
      <div class='form-group  col-md-6 '>
        <input class='form-control' placeholder='Password' type='password'>
      </div>
     <div class='form-group  col-md-6 '>
        <input class='form-control' placeholder='Confirm password' type='password'>
      </div>
      <div class='row'>
        <div class='col-xs-8'>
        <div class='checkbox'>
                  <label class='text-blue'>
                    <input type='checkbox' >Souhaitez-vous recevoir les promotions et les nouveautés
                  </label>
                </div>
         
        </div>
        <!-- /.col -->
        <div class='col-xs-6'>
          <button type='submit' class='btn btn-primary btn-block btn-flat' style='float:right;'>Confirmer</button>
        </div>
      </div>
    </form>

  </div>
</div>";

echo $form;