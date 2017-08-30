<?php

require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');
function getHeaderLinks($aUser){
	$links ="";
	if (!$aUser->getAdministrateur()) {
		$links = " <li class='dropdown user user-menu active' shopLink='panel'>
					            <a href='#' >
					              <span class='hidden-xs textOrange'>Catalogue</span>
					            </a>
					          </li>
					          <li class='dropdown user user-menu' shopLink='profile'>
					            <a href='#' >
					              <span class='hidden-xs textRed'>Profil</span>
					            </a>
					          </li>";
	}
	else{
		$links = " <li class='dropdown user user-menu active' >
				            <a href='#' >
				              <span class='hidden-xs textOrange'>Service</span>
				            </a>
				          </li>
				          <li class='dropdown user user-menu'>
				            <a href='#' >
				              <span class='hidden-xs textRed'>Facture</span>
				            </a>
				          </li>";
	}
	
	$links .= "<li class='dropdown user user-menu'>
				            <form action='#' method='get' class='sidebar-form' style='max-width:140px;margin: 5px;margin-top: 7px;'>
				        <div class='input-group'>
				          <input name='q' class='form-control' placeholder='Search...' type='text'>
				              <span class='input-group-btn'>
				                <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i>
				                </button>
				              </span>
				        </div>
				      </form>
				   </li>";
		
	return $links;
}
