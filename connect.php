<?php
$servername = "localhost";
$user = "moi";
$password = "12345";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>