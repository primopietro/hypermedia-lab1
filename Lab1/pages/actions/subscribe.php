<?php
require_once '../../system/header.php';
require_once '../headers/login.php';
?>

<div style="width:500px;margin:auto;">
<h1 class="text-white"> &nbsp;
</h1>
<div class="box box-warning">
           <div class="login-box-body">
 

    <form action="../../index2.html" method="post">
       <p class="login-box-msg">Remplissez ce formulaire pour créer votre profil</p>
     <div class="form-group has-feedback">
        <input class="form-control" placeholder="Name" name="Name">
      </div>
       <div class="form-group has-feedback">
        <input class="form-control" placeholder="Family Name" name="familyName">
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="No Civic" name="nCivic">
      </div>
      
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Street" name="rue">
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Town" name="ville">
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Postal Code " name="CP">
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="telephone" name="telephone">
      </div>
         <p class="login-box-msg">Votre courriel servira à vous identifier lors de votre prochaine visite</p>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Email" type="email">
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Confirm email" type="email">
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Password" type="password">
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Confirm password" type="password">
      </div>
      <div class="row">
        <div class="col-xs-8">
        <div class="checkbox">
                  <label>
                    <input type="checkbox">Souhaitez-vous recevoir les promotions et les nouveautés
                  </label>
                </div>
         
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat" style="float:right;">Confirmer</button>
        </div>
      </div>
    </form>

  </div>
</div>

<?php
require_once '../../system/footer.php';
?>