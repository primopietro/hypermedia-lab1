<?php
$erreur="404";
switch($erreur)
{
   case '400':
       echo 'Erreur'.$erreur.'<br>Échec de l\'analyse HTTP.';
   break;
   case '401':
       echo 'Erreur'.$erreur.'<br>Le pseudo ou le mot de passe n\'est pas correct !';
   break;
   case '402':
       echo 'Erreur'.$erreur.'<br>Le client doit reformuler sa demande avec les bonnes données de paiement.';
   break;
   case '403':
       echo 'Erreur'.$erreur.'<br>Requête interdite !';
   break;
   case '404':
       echo 'Erreur'.$erreur.'<br>La page n\'existe pas ou plus !';
   break;
   case '405':
       echo 'Erreur'.$erreur.'<br>Méthode non autorisée.';
   break;
   case '500':
       echo 'Erreur'.$erreur.'<br>Erreur interne au serveur ou serveur saturé.';
   break;
   case '501':
       echo 'Erreur'.$erreur.'<br>Le serveur ne supporte pas le service demandé.';
   break;
   case '502':
       echo 'Erreur'.$erreur.'<br>Mauvaise passerelle.';
   break;
   case '503':
       echo 'Erreur'.$erreur.'<br> Service indisponible.';
   break;
   case '504':
       echo 'Erreur'.$erreur.'<br>Trop de temps à la réponse.';
   break;
   case '505':
       echo 'Erreur'.$erreur.'<br>Version HTTP non supportée.';
   break;
   default:
   echo 'Erreur !';
}
?>
