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
  $data = getDataById('absen', 'id_absen', $id);
  $dataList = getDataJoinWhere('list_absen', 'id_list','absen','id_absen', 'id_absen','no_pegawai', $id);
} else {
    @header('Location:'.$base_url.'index.php');
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
            <div class="card-body text-start">
            </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Jam Masuk</th>
                          <th>Jam Keluar</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($dataList as $row) : ?>
                        <tr>
                          <th scope="col"><?= $no; ?></th>
                          <td><?= $row['tanggal']; ?></td>
                          <td><?= $row['jam_masuk']; ?></td>
                          <td><?= $row['jam_keluar']; ?></td>
                          <td><?= $row['status']; ?></td>
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
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
<?php include 'layout/footer.php'; ?>
