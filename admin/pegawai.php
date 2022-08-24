<?php 
$title = 'Data Pegawai';
require '../function.php';

if (isset($_GET['hapus'])) {
  $id = htmlspecialchars($_GET['hapus']);
  $sql = $mysql->query("DELETE FROM pegawai WHERE no_pegawai='$id'");
  if ($sql) {
      echo '<script>
      alert("Data Berhasil Di hapus");
      window.location.href="pegawai.php";
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
            <a href="tambah_pegawai.php" class="btn btn-primary w-25 float-end mt-3"><i class="mdi mdi-account-multiple-plus"></i
                  > Tambah Pegawai</a>
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      id="pegawai"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>No Pegawai</th>
                          <th>Nama Pegawai</th>
                          <th>TTL</th>
                          <th>Jenis Kelamin</th>
                          <th>Posisi Jabatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($dataPegawai as $row) : ?>
                        <tr>
                          <th scope="col"><?= $no; ?></th>
                          <td><img src="../file/<?= $row['profil']; ?>" alt="profil pegawai"
                              width="50"></td>
                          <td><?= $row['no_pegawai']; ?></td>
                          <td><?= $row['nama_pegawai']; ?></td>
                          <td><?= $row['tempat_lahir']; ?>, <?= $row['tanggal_lahir']; ?></td>
                          <td><?= $row['jenis_kelamin']; ?></td>
                          <td><?= $row['posisi_jabatan']; ?></td>
                          <td>
                            <a href="view_pegawai.php?id=<?= $row['no_pegawai']; ?>"
                              class="btn btn-sm btn-info">View</a>
                            <a href="edit_pegawai.php?id=<?= $row['no_pegawai']; ?>"
                              class="btn btn-sm btn-warning">Edit</a>
                            <a href="?hapus=<?= $row['no_pegawai']; ?>"
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
    $('#pegawai').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel'
        ]
    } );
} );
</script>
<?php include 'layout/footer.php'; ?>
