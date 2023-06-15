

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ÜYE KAYIT İŞLEMİ</title>
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
</head>

<body>
  <div class="container py-5">
    <div class="card p-5">
      <h1 class="mb-4">Üye Kayıt İşlemi</h1>
      <form action="./kaydet.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Kullanıcı Adı</label>
          <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
            id="username" placeholder="Kullanıcı Adı " name="kullaniciadi">
          <div class="invalid-feedback">
            <?php echo $username_err; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email Adresi</label>
          <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="email"
           placeholder="Email"  name="email">
          <div class="invalid-feedback">
            <?php echo $email_err; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Parola</label>
          <input type="password" class="form-control <?php echo (!empty($parola_err)) ? 'is-invalid' : ''; ?>"
            id="password" placeholder="Parola" name="parola">
          <div class="invalid-feedback">
            <?php echo $parola_err; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="password-confirm" class="form-label">Parola Tekrar</label>
          <input type="password" class="form-control <?php echo (!empty($parolatkr_err)) ? 'is-invalid' : ''; ?>"
            id="password-confirm" placeholder="Parola Tekrar" name="parolatkr">
          <div class="invalid-feedback">
            <?php echo $parolatkr_err; ?>
          </div>
        </div>
        <button type="submit" name="kaydet" value="kaydet" class="btn btn-primary">Kaydet</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

