<?php 
$title = 'Data Absen';
require '../function.php';

if (isset($_GET['id'])) {
  $data = getDataById('absen', 'id_absen', $_GET['id']);
  $dataList = getDataJoinWhere('list_absen', 'id_list','pegawai','no_pegawai', 'no_pegawai','id_absen', $_GET['id']);
} else {
  header("Location: absen.php");
}

if (isset($_GET['hapus'])) {
  $id = htmlspecialchars($_GET['hapus']);
  $sql = $mysql->query("DELETE FROM list_absen WHERE id_list='$id'");
  if ($sql) {
      echo '<script>
      alert("Data Berhasil Di hapus");
      window.location.href="absen.php";
  </script>';
  // header('Location:'.$base_url.'admin/admin.php');
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
            <div class="card-body text-end">
                <a href="scan_qr.php?id=<?= $data['id_absen']; ?>&&absen=AM" class="btn btn-primary w-25 float-end mt-3"><i class="mdi mdi-qrcode"></i> ABSEN MASUK</a>
                <a href="scan_qr.php?id=<?= $data['id_absen']; ?>&&absen=AK" class="btn btn-info w-25 float-end mt-3"><i class="mdi mdi-qrcode"></i> ABSEN KELUAR</a>
                
            </div>
            <div class="card-body text-start">
              
                <h4 class="ms-auto">Absen Tanggal : <?= date_format(date_create($data['tanggal']), "j M Y"); ?></h4>
            </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table id="list" class="display nowrap table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>No Pegawai</th>
                          <th>Nama Pegawai</th>
                          <th>Jam Masuk</th>
                          <th>Jam Keluar</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($dataList as $row) : ?>
                        <tr>
                          <th scope="col"><?= $no; ?></th>
                          <td><?= date_format(date_create($data['tanggal']), "j M Y");?></td>
                          <td><?= $row['no_pegawai']; ?></td>
                          <td><?= $row['nama_pegawai']; ?></td>
                          <td><?= $row['jam_masuk']; ?></td>
                          <td><?= $row['jam_keluar']; ?></td>
                          <td><?= $row['status']; ?></td>
                          <td>
                            <a href="?hapus=<?= $row['id_list']; ?>&&id=<?= $row['id_absen']; ?>"
                              onclick="return confirm('Data Ini Akan Di Hapus.?')"
                              class="btn btn-sm btn-danger">Hapus</a>
                          </td>
                        </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                      </tbody>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
<script>
  $(document).ready(function() {
    $('#list').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel'
        ]
    } );
} );
</script>
<?php include 'layout/footer.php'; ?>
