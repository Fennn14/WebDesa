<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
   Enkripsi Desa Namo buaya AES 128 Bit
  </title>
  <link rel="icon" href="assets/assets2/img/logosmd.png">

  <!-- Custom fonts for this template-->
  <link href="assets/assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/assets2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

  <style>
    body {
      background-image: url('assets/assets2/img/bg1.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-1">Login <br>Keamanan Sistem informasi <br>Namo Buaya Menggunakan Metode <br>Enkripsi AES 128 Bit <br> </h1>
                    <img src="assets/assets2/img/logosmd.png" class="mt-2 mb-4" width="100">
                  </div>

                  <form class="user" method="POST" action="auth.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" placeholder="Masukan Username..." name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-success btn-user btn-block">
                      Masuk
                    </button>
                  </form>
                  <hr>
                  <div class="text-right">
                    <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                  </div>
                  <div class="copyright text-center my-auto">
                    <span>Tugas akhir efendi &copy;<?= date('Y'); ?> </span>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</html>