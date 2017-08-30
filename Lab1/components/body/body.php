<?php
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/client.php');
require_once ($_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/MVC/model/utilisateur.php');

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
// if session not set (user not logged in)
if (! isset ( $_SESSION ["currentClient"] )) {
	require_once 'login.php';
}
else {
	
	require_once 'panel/panel.php';
}