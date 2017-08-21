<?php
require_once '../../system/header.php';
?>

<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>++</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Info</b>++</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 	 <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" >
              <span class="hidden-xs">Service</span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" >
              <span class="hidden-xs">Profil</span>
            </a>
          </li>
          
          <li class="dropdown user user-menu">
            <form action="#" method="get" class="sidebar-form" style="margin: 0px;margin-top: 7px;">
        <div class="input-group">
          <input name="q" class="form-control" placeholder="Search..." type="text">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
          </li>
        </ul>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" >
              <span class="hidden-xs">Se déconnecter</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<?php
require_once '../../system/footer.php';
?>