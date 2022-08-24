<?php 
$title = 'Edit List Absen';
require '../function.php';
if (isset($_GET['id'])) {
  $data = getDataById('list_absen', 'id_list', $_GET['id']);
} else {
  header("Location: absen.php");
}

if (isset($_POST['update'])) {
  // var_dump($_POST);die;
  $func = editList($_POST);
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
              <h4 class="page-title">Edit Absen</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Edit Absen
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="card">
                <div class="card-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <h4 class="card-title text-center">Edit Absen</h4>
                    <input type="hidden" name="id_list" value="<?= $data['id_list']; ?>">
                    <div class="form-group row">
                      <label
                        for="jam_masuk"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Jam Masuk</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="time"
                          class="form-control"
                          id="jam_masuk" name="jam_masuk"
                          placeholder="Jam Masuk" value="<?= $data['jam_masuk']; ?>" 
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="jam_keluar"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Jam Keluar</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="time"
                          class="form-control"
                          id="jam_keluar" name="jam_keluar"
                          placeholder="Jam Keluar" value="<?= $data['jam_keluar']; ?>" 
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="status"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Status</label
                      >
                      <div class="col-sm-9">
                        <select name="status" id="status" class="form-control" required>
                            <option value="Hadir" <?= ($data['status'] == 'Hadir')? 'selected':''; ?>>Hadir</option>
                            <option value="Ijin" <?= ($data['status'] == 'Ijin')? 'selected':''; ?>>Ijin</option>
                            <option value="Tidak Hadir" <?= ($data['status'] == 'Tidak Hadir')? 'selected':''; ?>>Tidak Hadir</option>
                        </select>
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
