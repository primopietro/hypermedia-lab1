<?php

$user = "root";
$password = "";
$server = "localhost";
$dbName = "tia16010";

$conn = new mysqli($server,$user, $password, $dbName);
$conn->set_charset("utf8");
