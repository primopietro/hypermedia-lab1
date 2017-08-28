<?php
require_once '../../system/header.php';
require_once '../headers/login.php';
?>

<div style="width:500px;margin:auto;">
<h1 class="text-white"> &nbsp;
</h1>
<div class="box box-warning">
           <div class="login-box-body">
    <p class="login-box-msg">Veuillez vous identifier pour avoir la possibilité d'acheter des formations</p>

    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Couriel" type="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Mot de passe" type="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox icheck">
            <label>
              <div class="icheckbox_square-blue" ><input style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></div> Mot de passe oublié
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
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> 
     Login with Facebook</a>
    </div>

  </div>
</div>

<?php
require_once '../../system/footer.php';
?>