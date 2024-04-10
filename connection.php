<?php
// $servername = "localhost";
// $username = "nirmalamca_user32";
// $password = "9#{4zNvVxcep";
// $dbname = "nirmalamca_user32";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nirmalamca_user32";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>