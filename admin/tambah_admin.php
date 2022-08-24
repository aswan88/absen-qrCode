<?php 
$title = 'TAMBAH ADMIN';
require '../function.php';
if (isset($_POST['simpan'])) {
    $func = tambahAdmin($_POST);
        
    if ($func > 0) {
        echo '<script>
        alert("Data Berhasil Di Simpan");
        window.location.href="admin.php";
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
              <h4 class="page-title">Data Admin</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Data Admin
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
                    <h4 class="card-title text-center">Tambah Data Admin</h4>
                    <div class="form-group row">
                      <label
                        for="nama"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Nama</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="nama" name="nama"
                          placeholder="Nama" required
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="username"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Username</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="username" name="username"
                          placeholder="Username" required
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="password"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Password</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="password"
                          class="form-control"
                          id="password" name="password"
                          placeholder="Password" required
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
                      <button type="submit" name="simpan" class="btn btn-success text-white">
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
