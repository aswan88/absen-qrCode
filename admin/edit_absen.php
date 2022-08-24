<?php 
$title = 'Edit Absen';
session_start();
require '../function.php';
if(!@$_SESSION){
    @header('Location:'.$base_url.'login.php');
}else{
    if(@$_SESSION['login'] !== true && @$_SESSION['level'] == 'Admin'){
         @header('Location:'.$base_url.'login.php');
    }
}
if (isset($_GET['id'])) {
  $data = getDataById('absen', 'id_absen', $_GET['id']);
} else {
  header("Location: absen.php");
}

if (isset($_POST['update'])) {
    $func = editAbsen($_POST);
        
    if ($func > 0) {
        echo '<script>
        alert("Data Berhasil Di Simpan");
        window.location.href="absen.php";
        </script>';
    } else {
      echo $mysql->error;die;
    }
    
}




?>

<?php include 'layout/header.php'; ?>

<?php include 'layout/sidebar.php'; ?>
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Data Absen</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Data Absen
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
          <div class="row">
            <div class="card">
                <div class="card-body">
                <form class="form-horizontal" method="POST">
                  <div class="card-body">
                    <h4 class="card-title text-center">Tambah Data Absen</h4>
                    <input type="hidden" name="id_absen" value="<?= $data['id_absen']; ?>">
                    <div class="form-group row">
                      <label
                        for="tanggal"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Tanggal</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="date"
                          class="form-control"
                          id="tanggal" name="tanggal"
                          placeholder="Tanggal" value="<?= $data['tanggal']; ?>" required
                        />
                      </div>
                    </div>
                  
                  <div class="border-top">
                    <div class="card-body text-end">
                      
                      <a href="pegawai.php" class="btn btn-danger">
                      <i class="mdi mdi-code-less-than"></i
                  > Kembali
                      </a>

                      <button type="reset" class="btn btn-primary">
                      <i class="mdi mdi-alert"></i
                  > Reset
                      </button>
                      <button type="submit" name="update" class="btn btn-success text-white">
                      <i class="mdi mdi-floppy"></i
                  > Simpan
                      </button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
          </div>
        </div>
<?php include 'layout/footer.php'; ?>
