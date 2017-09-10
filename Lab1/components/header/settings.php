<?php

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
function getHeaderSettings($aUser){
	$settings ="";
	if (!$aUser->getAdministrateur()) {
		$settings= "<li class='dropdown user user-menu'>
		            <a href='#' >
		              <span class='hidden-xs'>Mon panier(1)</span>
		            </a>
		          </li>";
	}
	
	$settings.= "<li class='dropdown user user-menu logout'>
		<a href='javascript:void(0)' id='logout' >
		<span class='hidden-xs' >Se déconnecter</span>
		</a>
		</li>";
	
	return $settings;
}
