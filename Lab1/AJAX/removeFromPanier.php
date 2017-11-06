<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$idobj = htmlspecialchars($_POST['idobj']);

if (in_array($idobj, $_SESSION["panier"])){
    
    
    $my_array = $_SESSION["panier"];
    $to_remove = array($idobj);
    $result = array_diff($my_array, $to_remove);
    
 
    $_SESSION["panier"]= $result;
}
echo "success";