<?php
require_once '../../system/header.php';
require_once '../headers/login.php';
?>

<div style="width:500px;margin:auto;">
<h1 class="text-white"> &nbsp;
</h1>
<div class="box box-warning">
           <div class="login-box-body">
    <p class="login-box-msg">Remplissez ce formulaire pour créer votre profil</p>

    <form action="../../index2.html" method="post">
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
        <div class="col-xs-6">
          <div class="checkbox icheck">
            <label>
              <div class="icheckbox_square-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> Forgot password
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
        <div class="col-xs-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
    
    </div>

  </div>
</div>

<?php
require_once '../../system/footer.php';
?>