<?php
    require_once "_config/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= asset('_assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= asset('_assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 130px !important;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row align-items-center">
                
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center  mb-4">
                      <h1 class="h4 text-gray-900">LOGIN</h1>
                      <span class="text-muted">Sistem Informasi Pegawai</span>
                    </div>
                    <form class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                    </div>
                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                        Login
                    </a>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block">
                <img src="<?= asset('_assets/img/design/login.png') ?>" class="ml-n5" alt="login" width="110%">
            </div>

            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= asset('_assets/vendor/jquery/jquery.min.js') ?> "></script>
  <script src="<?= asset('_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?> "></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= asset('_assets/vendor/jquery-easing/jquery.easing.min.js') ?> "></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= asset('_assets/js/sb-admin-2.min.js') ?> "></script>

</body>

</html>
