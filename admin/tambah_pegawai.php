<?php 
$title = 'TAMBAH Pegawai';
require '../function.php';
if (isset($_POST['simpan'])) {
    $func = tambahPegawai($_POST, $_FILES);
        
    if ($func > 0) {
        echo '<script>
        alert("Data Berhasil Di Simpan");
        window.location.href="pegawai.php";
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
              <h4 class="page-title">Data Pegawai</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Data Pegawai
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
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <h4 class="card-title text-center">Tambah Data Pegawai</h4>
                    <div class="form-group row">
                      <label
                        for="no_pegawai"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Nomor Pegawai</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="no_pegawai" name="no_pegawai"
                          placeholder="Nomor Pegawai" required
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="nama_pegawai"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Nama Pegawai</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="nama_pegawai" name="nama_pegawai"
                          placeholder="Nama Pegawai" required
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="jenis_kelamin"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Jenis Kelamin</label
                      >
                      <div class="col-sm-9">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="tempat_lahir"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Tempat Lahir</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="tempat_lahir" name="tempat_lahir"
                          placeholder="Tempat Lahir" required
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="tanggal_lahir"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Tanggal Lahir</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="date"
                          class="form-control"
                          id="tanggal_lahir" name="tanggal_lahir"
                          placeholder="Tanggal Lahir" required
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="posisi_jabatan"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Posisi Jabatan</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="posisi_jabatan" name="posisi_jabatan"
                          placeholder="Posisi Jabatan" required
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="profil"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Profil</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="file"
                          class="form-control"
                          id="profil" name="profil"
                          placeholder="Profil" required
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
                          placeholder="Password Here" required
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
