<?php
include './baglanti.php';


  $username=$_POST["kullaniciadi"];
  $parola=md5($_POST["parola"]);

  $servername="localhost";
  $connUsername="root";
  $connPassword="";
  $connDbname="test";

 
  
  $sql = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$username' and parola = '$parola'";
  $result = mysqli_query($conn, $sql);
 
  
  if (mysqli_num_rows($result) > 0) {
    
    ob_start();
    session_start();
    $_SESSION["kullanici_id"] = mysqli_fetch_assoc($result)['id'];
    $_SESSION["kullanici_adi"] = $username;
    $_SESSION["parola"] = $parola;
    header("location:takvim.php");

  } else {
    echo "0 results";
    echo '<div class="alert alert-danger" role="alert">
    Kullanıcı Adı Yanlış
    </div>';
    header("location:login.php");
  }
  
  mysqli_close($conn);


?>