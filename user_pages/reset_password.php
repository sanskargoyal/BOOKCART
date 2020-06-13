<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BOOKCART</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-12 col-lg-12 col-md-10">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url(../img/login.jpg)"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><i class="fa fa-book mr-2 shadow-sm" style="color: #ff6c00"></i>BOOKCART | Reset Password</h1>
                    <span>Recover Your Password</span>
                  </div>
                  <?php 
                  $user_id = $_GET['user'];
                  ?>
                  <form class="user mt-4" action="reset.php?user=<?php echo $user_id ?>" method="POST">
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user shadow-sm" id="exampleInputEmail" aria-describedby="emailHelp" placeholder=" New Password..." name="npass">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user shadow-sm" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Confirm Password..." name="cpass">
                    </div>
                    <button type="submit" class="btn text-light shadow-sm btn-user btn-block" style="background-color: #ff6c00" name="reset">
                      Reset Password
                    </button>
                  </form>
                  <hr class="shadow-sm">
                  <div class="text-center">
                    <a class="small" href="login/register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
