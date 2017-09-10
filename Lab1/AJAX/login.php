<?php

if(isset($_POST)){
	//Imports
	require_once "../MVC/model/utilisateur.php";
	require_once "../MVC/model/client.php";
	
	//Variables
	$email = htmlspecialchars($_POST["email"]);
	$password = htmlspecialchars($_POST["password"]);
	
	//Verif login
	$user = new Utilisateur();
	$user->setCourriel($email);
	$user->setMot_de_passe($password);
	
	//Check user login and return 
	if($user->checkValidUser()){
		//Start session
		session_start();
		
		//Set session variable
		$_SESSION["currentUser"] = $user;
		
		//If user is not an Admin, get current client for the session
		if(!$user->getAdministrateur()){
			//Get client info
			
			//Get client for this user
			$client = new Client();
			
			if(	$client->getInfoFromPk_utilisateur($user->getPk_utilisateur())){
				//Set client in the current session
				$_SESSION["currentClient"] = $client;
			}
		}
		else{
			//Return success response to front-end
			echo "success";
		}
		
	
	}
	
}