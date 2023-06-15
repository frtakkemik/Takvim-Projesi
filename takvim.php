

<?php
session_start();
if (isset($_SESSION["kullanici_adi"]) and isset($_SESSION["parola"])) {
    
   include 'baglanti.php';
               $userId = $_SESSION["kullanici_id"];
               $sql = "SELECT * FROM olaylar WHERE kullanici_id = '$userId'";
               $result = mysqli_query($conn, $sql);
   


               if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['sil'])) {
                    $id = $_POST['sil'];


            

                   
                
                   
            
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['güncelle'])) {
                            $userid = $_POST['güncelle'];
                    
                            $sql = "UPDATE olaylar SET olayin_tanimlanmasi = 'olayin_tanimlanmasi' WHERE id = '$userid'";

                            
                    
                            if (mysqli_query($conn, $sql)) {
                                echo "Görev başarıyla güncellendi.";
                            } else {
                                echo "Güncelleme işlemi başarısız oldu: " . mysqli_error($conn);
                            }
                    
                    
                    
                    mysqli_close($conn);
                }
            }
        }
    }


 


 ?>
<?php
$targetDate = ""; 
$countdownActive = false; 

if (isset($_POST["kaydet"])) {
    $targetDate = $_POST["hedef_tarih"];
    $countdownActive = true;
}

if ($countdownActive) {
    $targetTimestamp = strtotime($targetDate);
    $currentTimestamp = time();
    
    $secondsRemaining = $targetTimestamp - $currentTimestamp;
    
    $days = floor($secondsRemaining / (60 * 60 * 24));
    $hours = floor(($secondsRemaining % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($secondsRemaining % (60 * 60)) / 60);
    $seconds = $secondsRemaining % 60;
    
    echo "Kalan süre: $days gün, $hours saat, $minutes dakika, $seconds saniye";
    
   
    echo '<script>
        setTimeout(function() {
            alert("Takvim Süreniz dolmuştur!");
        }, ' . ($secondsRemaining * 1000) . '); 
    </script>';
}
?>
<style>
    .custom-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        animation: custom-button-bounce 1s infinite;
    }

    .custom-button:hover {
        background-color: #0056b3;
    }

    @keyframes custom-button-bounce {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
        100% {
            transform: translateY(0);
        }
    }
</style>

<form method="POST">
    <label for="hedef_tarih">Hedef Tarih ve Saat:</label>
    <input type="datetime-local" id="hedef_tarih" name="hedef_tarih" required>
    <button type="submit" name="kaydet" class="custom-button">Kaydet</button>
</form>





   



<!DOCTYPE html>
<html>

<head>
    <title>SCRUM TABLOSU İLE TAKVİM PROGRAMI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .Yap {
            background-color: #ffcccc;
        }

        .Devam-Etmekte {
            background-color: #ffffcc;
        }

        .Tamamlandı {
            background-color: #ccffcc;
        }

        .add-task-form {
            margin-top: 20px;
        }

        .add-task-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .add-task-form input[type="text"],
        .add-task-form input[type="date"],
        .add-task-form select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .add-task-form button[type="submit"] {
            padding: 5px 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .task-card {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
        }

        .task-card span {
            font-weight: bold;
        }

        .task-card small {
            color: #666;
        }

        .task-card.Yap{
            background-color: #ffcccc;
        }

        .task-card.Devam-Etmekte {
            background-color: #ffffcc;
        }

        .task-card.Tamamlandı {
            background-color: #ccffcc;
        }
    </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>
    <div class="container">
        <?php
    
        $tasks = array(
            
            
        );
        $startDate = '2023-06-01';
        $endDate = '2023-07-26';

        $daysCount = floor((strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24)) + 1;

        $dates = array();
        for ($i = 0; $i < $daysCount; $i++) {
            $currentDate = date('Y-m-d', strtotime($startDate . ' +' . $i . ' day'));
            $dates[] = $currentDate;
        }

        $weeks = array_chunk($dates, 7);
        ?>

        <h2>SCRUM TABLOSU İLE TAKVİM PROGRAMI</h2>

        <button type="button" class="btn btn-primary" id="insertButton" data-toggle="modal" data-target="#exampleModalCenter">
          Görev Ekle
        </button>
        
        <div style='text-align: right;'>
            <a href='cikis.php' style='color: #fff; background-color: green; border: 1px solid #c0392b; padding: 5px 10px; text-decoration: none;'>Çıkış Yap</a>
          </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">OLAYIN TANIMLANMASI</th>
                <th scope="col">OLAYIN TİPİ</th>
                <th scope="col">OLAYIN AÇIKLAMASI</th>
                <th scope="col">OLAYIN BAŞLANGIÇ ZAMANI</th>
                <th scope="col">OLAY ZAMANI</th>
                <th scope="col">OLAY DURUMU</th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>
               <?php 
               foreach(mysqli_fetch_all($result, MYSQLI_ASSOC) as $value){ ?>     
                <tr>
                   <td> <?php echo $value["olayin_tanimlanmasi"];  ?></td>
                      <td> <?php echo $value["olayin_tipi"];  ?></td>
                          <td> <?php echo $value['olayin_aciklamasi'];  ?></td>
                              <td> <?php echo $value['olay_baslangic_zamani'];  ?></td>
                                  <td> <?php echo $value['olay_zamani'];  ?></td>
                                      <td> <?php echo $value['olay_durum'];  ?></td> 
                                      
                                      
                       <form method="POST" action="./takvimIslem.php" class="delete-form">
                        <td><button type="submit" name="delete" value="<?php echo $value['id'] ?>" class="btn btn-danger">Sil</button></td>
                        <td>
                        <button type="button" class="btn btn-primary updateButton"  
                        value="<?php echo $value['id'] ?>" 
                         data-toggle="modal" 
                        data-target="#exampleModalCenter">
                            Güncelle
                        </button>
                    </td>
                     </form>
                </tr>
             <?php } ?>
            </tbody>
           </table>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Görev Ekle/Düzenle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h3>GÖREV EKLE</h3>
   
   <form method="POST" action="./takvimIslem.php" class="add-task-form">
      <input type="hidden" id="olayId" name="olayId"/>   
      
      
       <input type="hidden" name="kullanici_id" value="<?= $_SESSION["kullanici_id"] ?>" />
       <label for="olayin_tanimlanmasi">Olayın Tanımlanması</label>
       <input type="text" id="olayin_tanimlanmasi" name="olayin_tanimlanmasi" required>

       <label for="olayin_tipi">Olayın Tipi</label>
       <input type="text" id="olayin_tipi" name="olayin_tipi" required>

       <label for="olayin_aciklamasi">Olayın Açıklaması</label>
       <textarea  id="olayin_aciklamasi" name="olayin_aciklamasi" required> </textarea>

       <label for="olay_baslangic_zamani">Olayın Başlangıç Zamanı:</label>
       <input type="datetime-local" id="olay_baslangic_zamani" name="olay_baslangic_zamani" required>

       <label for="olay_zamani">Olayın Zamanı:</label>
       <input type="datetime-local" id="olay_zamani" name="olay_zamani" required>

       <label for="olay_durum">Görev Durumu:</label>
       <select id="olay_durum" name="olay_durum" required>
           <option value="Yap">Yap</option>
           <option value="Devam-Etmekte">Devam Etmekte</option>
           <option value="Tamamlandı">Tamamlandı</option>
       </select>
       <button name="insertOrUpdate" type="submit">Kaydet</button>
   </form>
      </div>
     
    </div>
  </div>
</div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newTask = array(
                'id' => count($tasks) + 1,
                'title' => $_POST['taskTitle'],
                'status' => $_POST['taskStatus'],
                'date' => $_POST['taskDate']
            );
            $tasks[] = $newTask;
            echo '<p>Görev Başarılı Bir Şekilde Eklendi!</p>';
            echo '<div class="task-card ' . $newTask['status'] . '">';
            echo '<span>Görev Başlığı: </span>' . $newTask['title'] . '<br>';
            echo '<span>Görev Tarihi: </span>' . $newTask['date'] . '<br>';
            echo '<small>ID: ' . $newTask['id'] . '</small>';
            echo '</div>';
        }
        ?>

    </body>
</html>
<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script >
   $('.updateButton').click(function(){
      
    $.ajax({
      url: './takvimIslem.php',
      method: 'POST',
      data: {
        getList: 1,
        olay_id: $(this).val()
      },
      success: function(response) {
        var parsedResponse = JSON.parse(response);
        console.log(parsedResponse.kullanici_id);
        $('#olay_id').val(parsedResponse.olayin_tanimlanmasi);
        $('#olayId').val(parsedResponse.id);
        $('#olayin_tanimlanmasi').val(parsedResponse.olayin_tanimlanmasi);
        $('#olayin_tipi').val(parsedResponse.olayin_tipi);
        $('#olayin_aciklamasi').val(parsedResponse.olayin_aciklamasi);
        $('#olayin_baslangic_zamani').val(parsedResponse.olayin_baslangic_zamani);
        $('#olayin_zamani').val(parsedResponse.olayin_zamani);
        $('#olayin_durum').val(parsedResponse.olayin_durum);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
 
      
    });
    $('#insertButton').click(function(){
        $('#olay_id').val("");
        $('#olayId').val("");
        $('#olayin_tanimlanmasi').val("");
        $('#olayin_tipi').val("");
        $('#olayin_aciklamasi').val("");
        $('#olayin_baslangic_zamani').val("");
        $('#olayin_zamani').val("");
        $('#olayin_durum').val("");
    });
    
</script>

<?php
} else {
    header('location:login.php');
}
?>




