<?php

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
function getHeaderSettings($aUser){
	$settings ="";
	if (!$aUser->getAdministrateur()) {
		$settings= "<li class='dropdown user user-menu' shopLink='panel/cartList'>
		            <a id='panier'>
		              <span class='hidden-xs'>Mon panier(".sizeof($_SESSION["panier"]).")</span>
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
