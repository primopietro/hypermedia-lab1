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
		
		//Get client for this user
		$client = new Client();
		
		//Get client info
		if(	$client->getInfoFromPk_utilisateur($user->getPk_utilisateur())){
			//Set client in the current session
			$_SESSION["currentClient"] = $client;
		}
	
	}
	
}