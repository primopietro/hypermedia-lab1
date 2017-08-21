<?php

$user = "root";
$password = "";
$server = "localhost";
$dbName = "tia16010";

$conn = new mysqli($server,$user, $password, $dbName);

if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
}

echo 'Connected to the database.<br>';

$result = $conn->query("SELECT name FROM employee");

echo "Number of rows: $result->num_rows";

$result->close();

$conn->close();