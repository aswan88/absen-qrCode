<?php 
$title = 'Scan QR';
require '../function.php';

if (isset($_GET['id'])) {
  $data = getDataById('absen', 'id_absen', $_GET['id']);
} else {
  header("Location: absen.php");
}

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
              <h4 class="page-title">Scan QR Code</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Scan QR Code
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
                <?php if ($_GET['absen'] == 'AM') : ?>
                  <h3>Absen Masuk</h3>
                  <?php else: ?>
                    <h3>Absen Keluar</h3>
                    <?php endif; ?>
                <h4 class="ms-auto">Absen Tanggal : <?= date_format(date_create($data['tanggal']), "j M Y");; ?></h4>
                <div class="card-body">
                  <input type="hidden" name="id_absen" id="id_absen" value="<?= $data['id_absen']; ?>">
                  <input type="hidden" name="absen" id="absen" value="<?= $_GET['absen']; ?>">
                  <div id="reader" class="col-md-4"></div>
                </div>
              </div>
          </div>
        </div>
<script>
let audio = new Audio("../file/audio/beep.mp3");
let id= document.getElementById("id_absen").value;
let absen= document.getElementById("absen").value;
console.log(id);

function onScanSuccess(decodedText) {
    // Handle on success condition with the decoded text or result.
    console.log(`Scan result: ${decodedText}`);
    $.ajax({
        url:'cek_absen.php',
        type:'post',
                cache:true,
                data: {
                  id: id,
                  no_pegawai:decodedText,
                  absen:absen,
                },
                success:  function (data) {
                    jkt = data;
                    console.log(jkt);
                    alert(data)
                },
                error: function (ex) {
                  console.log(ex);
                }
            }); 
    audio.play();
}
var html5QrcodeScanner = new Html5QrcodeScanner(
	"reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);
html5QrcodeScanner.start({ facingMode: { exact: "environment"} }, config, qrCodeSuccessCallback);
</script>
<?php include 'layout/footer.php'; ?>
