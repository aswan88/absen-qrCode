<?php 
$title = 'VIEW Pegawai';
require '../function.php';

if (isset($_GET['id'])) {
  $data = getDataById('pegawai', 'no_pegawai', $_GET['id']);
}else {
  header("Location: pegawai.php");
}
?>


<?php include 'layout/header.php'; ?>

<?php include 'layout/sidebar.php'; ?>
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Detail Pegawai</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Detail Pegawai
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
            <div class="border-bottom">
                    <div class="card-body text-end">
                      <a href="pegawai.php" class="btn btn-danger">
                      <i class="mdi mdi-code-less-than"></i> Kembali
                      </a>
                      <a href="../print_pegawai.php?data=<?= $data['no_pegawai']; ?>" target="_blank" class="btn btn-info">
                      <i class="mdi mdi-printer"></i> Print Profil Pegawai
                      </a>
                      <a href="../print_qr.php?data=<?= $data['qr_code']; ?>" target="_blank" class="btn btn-primary">
                      <i class="mdi mdi-qrcode"></i> Print QR CODE
                      </a>
                    </div>
                  </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="<?= '../file/'. $data['profil']; ?>" alt="Profile" width=" 200">
                    </div>
                    <div class="col-md-8">
                      <table class="table table-hover">
                        <tr>
                          <td>No Pegawai</td>
                          <td>:</td>
                          <td><?= $data['no_pegawai']; ?></td>
                        </tr>
                        <tr>
                          <td>Nama Pegawai</td>
                          <td>:</td>
                          <td><?= $data['nama_pegawai']; ?></td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td>:</td>
                          <td><?= $data['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                          <td>Tempat Tanggal Lahir</td>
                          <td>:</td>
                          <td><?= $data['tempat_lahir']; ?>, <?= $data['tanggal_lahir']; ?></td>
                        </tr>
                        <tr>
                          <td>Jabatan / Posisi</td>
                          <td>:</td>
                          <td><?= $data['posisi_jabatan']; ?></td>
                        </tr>
                        <tr>
                          <td>Password</td>
                          <td>:</td>
                          <td><?= $data['password']; ?></td>
                        </tr>
                        <tr>
                          <td>QR CODE</td>
                          <td>:</td>
                          <td><img src="<?= $base_url . 'qr_code/'. $data['qr_code']; ?>" alt="QR Code" width="100"></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>

<?php include 'layout/footer.php'; ?>
