<?php
include './baglanti.php';
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
function redirectPage(){
  header('location:takvim.php');
}

if(isset($_POST['getList'])){
  $olayId = $_POST['olay_id'];
  $sql = "SELECT * FROM olaylar WHERE id = '$olayId'";
  $result = mysqli_query($conn, $sql);
  echo json_encode(mysqli_fetch_assoc($result));
}

if(isset($_POST['delete'])){
     $sql = "DELETE FROM olaylar WHERE id = {$_POST['delete']}";
                    if (mysqli_query($conn, $sql)) {
                         redirectPage();
                    } else {
                        echo "Silme işlemi başarısız oldu: " . mysqli_error($conn);
                    }
}


if(isset($_POST['insertOrUpdate'])){
  $kullanici_id=(int)$_POST["kullanici_id"];
  $olayin_tanimlanmasi=$_POST["olayin_tanimlanmasi"];
  $olayin_tipi=$_POST["olayin_tipi"];
  $olayin_aciklamasi=$_POST["olayin_aciklamasi"];
  $olay_baslangic_zamani=$_POST["olay_baslangic_zamani"];
  $olay_zamani=$_POST["olay_zamani"];
  $olay_durum=$_POST["olay_durum"];

  if($_POST['olayId']){
    $sql = "UPDATE olaylar SET 
    olayin_tanimlanmasi = '$olayin_tanimlanmasi',
    olayin_tipi = '$olayin_tipi', 
    olayin_aciklamasi = '$olayin_aciklamasi',
    olay_baslangic_zamani = '$olay_baslangic_zamani',
    olay_zamani= '$olay_zamani',
    olay_durum= '$olay_durum'
    WHERE id = {$_POST['olayId']}";
    if ($conn->query($sql) === TRUE) {
      redirectPage();
    } else {
      echo "Error: " . $sql . "<br>";
    }
  }else{
      $sql = "INSERT INTO `olaylar`
      (`kullanici_id`, `olay_zamani`, `olay_baslangic_zamani`, `olayin_tanimlanmasi`, `olayin_tipi`, `olayin_aciklamasi`, `olay_durum`) 
      VALUES ('$kullanici_id', '$olay_zamani', '$olay_baslangic_zamani', '$olayin_tanimlanmasi', '$olayin_tipi', '$olayin_aciklamasi', '$olay_durum')";

      if ($conn->query($sql) === TRUE) {
        redirectPage();
      } else {
        echo "Error: " . $sql . "<br>";
      }

  }
  


}

if(isset($_POST['update'])){
  echo "update işlemi var";
}

$conn->close();


?>