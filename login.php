
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ÜYE GİRİŞ İŞLEMİ</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    .card {
      animation: slide-up 0.5s ease-out;
    }

    @keyframes slide-up {
      0% {
        transform: translateY(50px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .btn-primary {
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
      }
    }

    .form-control.is-invalid {
      border-color: #dc3545;
      animation: shake 0.5s;
    }

    @keyframes shake {
      0% {
        transform: translateX(0);
      }
      25% {
        transform: translateX(-10px);
      }
      50% {
        transform: translateX(10px);
      }
      75% {
        transform: translateX(-10px);
      }
      100% {
        transform: translateX(0);
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>

<body>
  <div class="container py-5">
    <div class="card p-5">
      <form action="./loginForm.php" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
          <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
            id="exampleInputEmail1" placeholder="Kullanıcı Adı" name="kullaniciadi">
          <div class="invalid-feedback">
            <?php echo $username_err; ?>
          </div>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Parola</label>
          <input type="password" class="form-control <?php echo (!empty($parola_err)) ? 'is-invalid' : ''; ?>"
            id="exampleInputPassword1" placeholder="Parola" name="parola">
          <div class="invalid-feedback">
            <?php echo $parola_err; ?>
          </div>
        </div>

        <button type="submit" name="giris"  class="btn btn-primary">Giriş Yap</button>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.card').addClass('animate__animated animate__fadeInUp');
      $('button').addClass('animate__animated animate__pulse animate__infinite animate__slower');
   
    });
  </script>
</body>

</html>