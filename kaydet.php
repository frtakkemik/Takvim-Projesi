<?php
include './baglanti.php';

$username=$_POST["kullaniciadi"];
$email=$_POST["email"];
$parola=md5($_POST["parola"]);
$servername="localhost";

  if(isset($username) && isset($email) && isset($parola))
{


$sql = "INSERT INTO kullanicilar (kullanici_adi, email, parola) VALUES ('$username','$email','$parola')";

if ($conn->query($sql) === TRUE) {
  header('location:login.php');
} else {
  echo "Error: " . $sql . "<br>";
}

$conn->close();
  
}

?>