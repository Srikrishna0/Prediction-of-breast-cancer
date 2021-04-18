<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "predicition";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} ?>