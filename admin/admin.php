<?php 

$title = 'Data Admin';
session_start();
require '../function.php';
if(!@$_SESSION){
    @header('Location:'.$base_url.'login.php');
}else{
    if(@$_SESSION['login'] !== true && @$_SESSION['level'] == 'Admin'){
         @header('Location:'.$base_url.'login.php');
    }
}

if (isset($_GET['hapus'])) {
  $id = htmlspecialchars($_GET['hapus']);
  $sql = $mysql->query("DELETE FROM admin WHERE id_admin='$id'");
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
            <a href="tambah_admin.php" class="btn btn-primary w-25 float-end mt-3"><i class="mdi mdi-account-key"></i
                  > Tambah Admin</a>
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($dataAdmin as $row) : ?>
                        <tr>
                          <th scope="col"><?= $no; ?></th>
                          <td><?= $row['nama']; ?></td>
                          <td><?= $row['username']; ?></td>
                          <td><?= $row['password']; ?></td>
                          <td>
                            <a href="?hapus=<?= $row['id_admin']; ?>"
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
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
<?php include 'layout/footer.php'; ?>
