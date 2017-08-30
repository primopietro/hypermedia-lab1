<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
require_once "settings.php";
require_once "links.php";
session_start ();
// if session not set (user not logged in)
if (! isset ( $_SESSION ["currentClient"] )) {
	$default = "<header class='main-header'>
    <!-- Logo -->
    <a href='index.php' class='logo'>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class='logo-mini'><b>Info</b>++</span>
      <!-- logo for regular state and mobile devices -->
     <span class='logo-lg'><img src='images/icones/logo.png'></span>
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
          <li class='dropdown user user-menu' shopLink='login'>
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
	
	$loggedHeader = "<header class='main-header'>
					<a href='index.php' class='logo'>
				      <!-- mini logo for sidebar mini 50x50 pixels -->
				      <span class='logo-mini'><b>Info</b>++</span>
				      <!-- logo for regular state and mobile devices -->
				      <span class='logo-lg'><img src='images/icones/logo.png'></span>
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
			
				        <!-- User Account: style can be found in dropdown.less -->";
	
	$loggedHeader .= getHeaderSettings( $_SESSION ["currentUser"] );
	$loggedHeader .= "
			
				        </ul><br>
			
				        <ul class='nav navbar-nav'>
			
				          <!-- User Account: style can be found in dropdown.less -->";
	$loggedHeader .= getHeaderLinks( $_SESSION ["currentUser"] );
	$loggedHeader .= "</ul>
				      </div>
				    </nav>
				  </header>";
	echo $loggedHeader;
}