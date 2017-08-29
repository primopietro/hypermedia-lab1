<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
session_start ();
// if session not set (user not logged in)
if (! isset ( $_SESSION ["currentClient"] )) {
	$default = "<header class='main-header'>
    <!-- Logo -->
    <a href='../../index2.html' class='logo'>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class='logo-mini'><b>I</b>++</span>
      <!-- logo for regular state and mobile devices -->
      <span class='logo-lg'><b>Info</b>++</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class='navbar navbar-static-top'>
      <!-- Sidebar toggle button-->
      <a href='#' class='sidebar-toggle' data-toggle='push-menu' role='button'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </a>

      <div class='navbar-custom-menu'>
        <ul class='nav navbar-nav'>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class='dropdown user user-menu'>
            <a href='#' >
              <span class='hidden-xs'>S'identifier</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>";
	echo $default;
} // if session is set (user logged in)
else {
	// Get proper header
	// Check if user is admin
	if ($_SESSION ["currentUser"]->getAdministrateur ()) {
		$admin = "<header class='main-header'>
					<a href='../../index2.html' class='logo'>
				      <!-- mini logo for sidebar mini 50x50 pixels -->
				      <span class='logo-mini'><b>I</b>++</span>
				      <!-- logo for regular state and mobile devices -->
				      <span class='logo-lg'><b>Info</b>++</span>
				    </a>
				    <!-- Header Navbar: style can be found in header.less -->
				    <nav class='navbar navbar-static-top'>
				      <!-- Sidebar toggle button-->
				      <a href='#' class='sidebar-toggle' data-toggle='push-menu' role='button'>
				        <span class='sr-only'>Toggle navigation</span>
				        <span class='icon-bar'></span>
				        <span class='icon-bar'></span>
				        <span class='icon-bar'></span>
				      </a>
				 	 <div class='navbar-custom-menu'>
				        <ul class='nav navbar-nav'>
				         
				          <!-- User Account: style can be found in dropdown.less -->
				          <li class='dropdown user user-menu'>
				            <a href='javascript:void(0)' id='logout' >
				              <span class='hidden-xs' >Se d�connecter</span>
				            </a>
				          </li>
				        </ul><br>
				      
				        <ul class='nav navbar-nav'>
				         
				          <!-- User Account: style can be found in dropdown.less -->
				          <li class='dropdown user user-menu'>
				            <a href='#' >
				              <span class='hidden-xs textOrange'>Service</span>
				            </a>
				          </li>
				          <li class='dropdown user user-menu'>
				            <a href='#' >
				              <span class='hidden-xs textRed'>Facture</span>
				            </a>
				          </li>
				           <li class='dropdown user user-menu'>
				            <form action='#' method='get' class='sidebar-form' style='max-width:140px;margin: 5px;margin-top: 7px;'>
				        <div class='input-group'>
				          <input name='q' class='form-control' placeholder='Search...' type='text'>
				              <span class='input-group-btn'>
				                <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i>
				                </button>
				              </span>
				        </div>
				      </form>
				          </li>
				        </ul>
				      </div>
				    </nav>
				  </header>";
		echo $admin;
	}
	// If not admin
	else {
		$regularUser= "<header class='main-header'>
						<a href='../../index2.html' class='logo'>
					      <!-- mini logo for sidebar mini 50x50 pixels -->
					      <span class='logo-mini'><b>I</b>++</span>
					      <!-- logo for regular state and mobile devices -->
					      <span class='logo-lg'><b>Info</b>++</span>
					    </a>
					    <!-- Header Navbar: style can be found in header.less -->
					    <nav class='navbar navbar-static-top'>
					      <!-- Sidebar toggle button-->
					      <a href='#' class='sidebar-toggle' data-toggle='push-menu' role='button'>
					        <span class='sr-only'>Toggle navigation</span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					      </a>
					 	 <div class='navbar-custom-menu'>
					        <ul class='nav navbar-nav'>
					         
					          <!-- User Account: style can be found in dropdown.less -->
					          <li class='dropdown user user-menu'>
					            <a href='#' >
					              <span class='hidden-xs'>Mon panier(1)</span>
					            </a>
					          </li>
					          <li class='dropdown user user-menu'>
					            <a href='javascript:void(0)' id='logout'>
					              <span class='hidden-xs' >Se d�connecter</span>
					            </a>
					          </li>
					        </ul><br>
					    
					        <ul class='nav navbar-nav'>
					         
					          <!-- User Account: style can be found in dropdown.less -->
					          <li class='dropdown user user-menu'>
					            <a href='#' >
					              <span class='hidden-xs textOrange'>Catalogue</span>
					            </a>
					          </li>
					          <li class='dropdown user user-menu'>
					            <a href='#' >
					              <span class='hidden-xs textRed'>Profil</span>
					            </a>
					          </li>
					           <li class='dropdown user user-menu'>
					            <form action='#' method='get' class='sidebar-form' style='max-width:140px;margin: 5px;margin-top: 7px;'>
					        <div class='input-group'>
					          <input name='q' class='form-control' placeholder='Search...' type='text'>
					              <span class='input-group-btn'>
					                <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i>
					                </button>
					              </span>
					        </div>
					      </form>
					          </li>
					        </ul>
					      </div>
					    </nav>
					  </header>";
		echo $regularUser;
	}
	
}