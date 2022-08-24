<?php 

session_start();
require '../function.php';
if(!@$_SESSION){
    @header('Location:'.$base_url.'login.php');
}else{
    if(@$_SESSION['login'] !== true && @$_SESSION['level'] == 'Pegawai'){
         @header('Location:'.$base_url.'login.php');
    }
}

if (@$_SESSION['id']) {
	$id = @$_SESSION['id'];
  $data = getListDataById('list_absen', 'no_pegawai', $id);
} else {
    @header('Location:'.$base_url.'index.php');
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
                      Library
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
          <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light font-weight-bold text-white">
                    <?= $data->num_rows; ?>
                  </h1>
                  <h4 class="text-white"><i class="mdi mdi-account-check"></i> Riwayat Absen</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php include 'layout/footer.php'; ?>
