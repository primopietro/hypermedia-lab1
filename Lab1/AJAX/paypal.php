<?php
include("lib/paypal.php"); //Include the class
$pp = new paypalcheckout(); //Create an instance of the class
$pp->addMultipleItems($items); //Add all the items to the cart in one go