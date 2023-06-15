
<?php
$servername="localhost";
$connUsername="root";
$connPassword="";
$connDbname="test";

$conn = new mysqli($servername, $connUsername, $connPassword, $connDbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


?>