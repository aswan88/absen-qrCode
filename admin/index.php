<?php 
$title = 'Dashboard';
session_start();
require '../function.php';
if(!@$_SESSION){
    @header('Location:'.$base_url.'login.php');
}else{
    if(@$_SESSION['login'] !== true && @$_SESSION['level'] == 'Admin'){
         @header('Location:'.$base_url.'login.php');
    }
}




?>

<?php include 'layout/header.php'; ?>

<?php include 'layout/sidebar.php'; ?>
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Dashboard
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                <h1 class="font-light font-weight-bold text-white">
                   <?= $dataAdmin->num_rows; ?>
                  </h1>
                  <h4 class="text-white"><i class="mdi mdi-account-star"></i> Admin</h4>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light font-weight-bold text-white">
                   <?= $dataPegawai->num_rows; ?>
                  </h1>
                  <h4 class="text-white"> <i class="mdi mdi-account-card-details"></i> Data Pegawai</h4>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light font-weight-bold text-white">
                    <?= $dataAbsen->num_rows; ?>
                  </h1>
                  <h4 class="text-white"><i class="mdi mdi-account-check"></i> Absen</h4>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light font-weight-bold text-white">
                    <?= $dataList->num_rows; ?>
                  </h1>
                  <h4 class="text-white"><i class="mdi mdi-account-check"></i> Absen Pegawai</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php include 'layout/footer.php'; ?>
