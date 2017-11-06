<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$idobj = htmlspecialchars($_POST['idobj']);

if (!in_array($idobj, $_SESSION["panier"])){
    
    array_push($_SESSION["panier"], $idobj);
    
}
echo "success";