<?php

define('BASE_URL', 'http://localhost/projects/library_app/');


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "library_pro";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

