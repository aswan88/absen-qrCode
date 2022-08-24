<?php
@session_start();
require 'function.php';

if(@$_SESSION){
  if( @$_SESSION['level'] == 'Admin'){
      @header('Location:'.$base_url.'admin/index.php');
  }elseif(@$_SESSION['level'] == 'Pegawai'){
    @header('Location:'.$base_url.'pegawai/index.php');
  }
}
$pesan = false;
// var_dump(isset($_POST['login']));die;

if (isset($_POST['login'])) {
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $level = htmlspecialchars($_POST['level']);

  if ($level == 'Admin') {
    $cek = $mysql->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
    if ($cek->num_rows < 1) {
      $pesan = true;
    } else {
      $pesan = false;
      $data = $cek->fetch_assoc();
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['level'] = 'Admin';
      $_SESSION['id'] = $data['id_admin'];
      $_SESSION['username'] = $data['username'];
      header('Location:admin/index.php');
    }
  }else{
    $cek = $mysql->query("SELECT * FROM pegawai WHERE no_pegawai = '$username' AND password = '$password'");
    if ($cek->num_rows < 1) {
      $pesan = true;
    } else {
      $pesan = false;
      $data = $cek->fetch_assoc();
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['level'] = 'Pegawai';
      $_SESSION['id'] = $data['no_pegawai'];
      $_SESSION['username'] = $data['nama_pegawai'];
      header('Location:pegawai/index.php');
    }
  }
}



?>


<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Login Page</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="template/assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link href="template/dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="main-wrapper">
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
      </div>
      <div
        class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-dark
        "
      >
        <div class="auth-box p-5 bg-dark border-top border-secondary">
          <div id="loginform">
            <div class="text-center pt-3 pb-3">
              <span class="db"
                ><h3 class="text-white">Login</h3></span>
            </div>

            <?php if ($pesan == true) : ?>
                <div class="alert alert-danger"> username / Password Salah</div>
            <?php endif; ?>
            <!-- <div class="alert alert-danger"> username / Password Salah</div> -->
            <!-- Form -->
            <form action="" method="post">
              <div class="row pb-4">
                <div class="col-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-success text-white h-100"
                        id="basic-addon1"
                        ><i class="mdi mdi-account fs-4"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Username / No Pegawai"
                      aria-label="Username"
                      aria-describedby="basic-addon1"
                      required=""
                      name="username"
                    />
                  </div>
                  
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-danger text-white h-100"
                        id="basic-addon2"
                        ><i class="mdi mdi-lock fs-4"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Password"
                      aria-label="Password"
                      aria-describedby="basic-addon1"
                      required=""
                      name="password"
                    />
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-info text-white h-100"
                        id="basic-addon3"
                        ><i class="mdi mdi-account-key fs-4"></i
                      ></span>
                    </div>
                    <select name="level" id="level"  class="form-control form-control-lg"
                      aria-label="Password"
                      aria-describedby="basic-addon3"
                      required="">
                        <option selected disable>-- Pilih Level Login---</option>
                        <option value="Pegawai">Pegawai</option>
                        <option value="Admin">Admin</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row border-top border-secondary">
                <div class="col-12">
                    <div class="d-grid gap-2 pt-3">
                      <button class="btn btn-primary text-white" type="submit" name="login">
                        Login
                      </button>
                      </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="template/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="template/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
      $(".preloader").fadeOut();
      // ==============================================================
      // Login and Recover Password
      // ==============================================================
      $("#to-recover").on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
      });
      $("#to-login").click(function () {
        $("#recoverform").hide();
        $("#loginform").fadeIn();
      });
    </script>
  </body>
</html>
