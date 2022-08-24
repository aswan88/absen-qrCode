<?php 

include 'phpqrcode/qrlib.php';
$base_url = 'http://localhost/absenPegawai/';
$mysql = mysqli_connect("localhost", "root", "", "db_absen");
if (!$mysql) {
    echo "koneksi gagal";
}
date_default_timezone_set("Asia/Jayapura");


$dataAdmin = $mysql->query("SELECT * FROM admin ORDER BY id_admin DESC");
$dataPegawai = $mysql->query("SELECT * FROM pegawai ORDER BY no_pegawai DESC");
$dataAbsen = $mysql->query("SELECT * FROM absen ORDER BY id_absen DESC");
$dataList = $mysql->query("SELECT * FROM list_absen");

function getDataById($tabel,$fiel_name ,$id){
    global $mysql;
    $sql = $mysql->query("SELECT * FROM $tabel WHERE $fiel_name = $id");
    return $sql->fetch_assoc();
}
function getListDataById($tabel,$fiel_name ,$id){
    global $mysql;
    $sql = $mysql->query("SELECT * FROM $tabel WHERE $fiel_name = $id");
    return $sql;
}

function getDataJoin($tabel1, $id_tabel1, $tabel2, $id_tabel2, $foren_id){
    global $mysql;
    return $mysql->query("SELECT * FROM $tabel1 JOIN $tabel2 ON $tabel1.$foren_id = $tabel2.$id_tabel2 ORDER BY $id_tabel1 DESC");
}
function getDataJoinWhere($tabel1, $id_tabel1, $tabel2, $id_tabel2, $foren_id, $idWhere, $valWhere){
    global $mysql;
    return $mysql->query("SELECT * FROM $tabel1 JOIN $tabel2 ON $tabel1.$foren_id = $tabel2.$id_tabel2 WHERE $tabel1.$idWhere = $valWhere ORDER BY $id_tabel1 DESC");
}


 function tambahAdmin($data){
    global $mysql, $base_url;

    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    $cek = $mysql->query("SELECT username FROM admin WHERE username='$username'");
    if ($cek->num_rows > 0) {
        echo '<script>
        alert("Username sudah digunakan.!");
        window.location.href="'.$base_url.'admin/tambah_admin.php";
    </script>';
    exit();
    } else {
        $mysql->query("INSERT INTO admin (nama, username, password) VALUES ('$nama', '$username', '$password')
        ");
        return $mysql->affected_rows;
    } 

}

 function tambahPegawai($data, $file){
    global $mysql, $base_url;

    $no_pegawai = htmlspecialchars($data['no_pegawai']);
    $nama_pegawai = htmlspecialchars($data['nama_pegawai']);
    $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
    $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $posisi_jabatan = htmlspecialchars($data['posisi_jabatan']);
    $password = htmlspecialchars($data['password']);
    $created_at = date('Y-m-d H:i:s');
    $cek = $mysql->query("SELECT no_pegawai FROM pegawai WHERE no_pegawai='$no_pegawai'");
    if ($cek->num_rows > 0) {
        echo '<script>
        alert("Nomor pegawai/ NIK sudah digunakan.!");
        window.location.href="'.$base_url.'admin/tambah_pegawai.php";
    </script>';
    exit();
    } else {
        if ($file['profil']['error'] !== 4) {
            $profil = uploadFile($file['profil']);
        }
        $qr = qrCodeGen($no_pegawai);
        $mysql->query("INSERT INTO pegawai (no_pegawai,nama_pegawai, tempat_lahir, tanggal_lahir, jenis_kelamin, posisi_jabatan, profil, password, qr_code, created_at) VALUES ('$no_pegawai', '$nama_pegawai', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$posisi_jabatan', '$profil', '$password', '$qr', '$created_at')");
        return $mysql->affected_rows;
    } 

}
 function editPegawai($data, $file){
    global $mysql, $base_url;

    $no_pegawai = htmlspecialchars($data['no_pegawai']);
    $nama_pegawai = htmlspecialchars($data['nama_pegawai']);
    $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
    $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $posisi_jabatan = htmlspecialchars($data['posisi_jabatan']);
    $password = htmlspecialchars($data['password']);
    $updated_at = date('Y-m-d H:i:s');
    $noPegawaiLama = htmlspecialchars($data['noPegawaiLama']);
    $profilLama = $data['profilLama'];
    $qrCodeLama = $data['qrCodeLama'];

    // var_dump($no_pegawai .'||'. $noPegawaiLama);
    if ($no_pegawai === $noPegawaiLama) {
        $qr = $qrCodeLama;
    }else{
        unlink('../qr_code/' . $qrCodeLama);
        $qr = qrCodeGen($no_pegawai);
    }

    if ($no_pegawai === $noPegawaiLama) {
        if ($file['profil']['error'] !== 4) {
            $profil = uploadFile($file['profil']);
            unlink('../file/' . $profilLama);
        }else{
            $profil = $profilLama;
        }
        $mysql->query("UPDATE pegawai SET no_pegawai= '$no_pegawai',nama_pegawai= '$nama_pegawai', tempat_lahir= '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin= '$jenis_kelamin', posisi_jabatan= '$posisi_jabatan',profil='$profil', password='$password', qr_code='$qr', update_at = '$updated_at' WHERE no_pegawai = '$noPegawaiLama'");
        return $mysql->affected_rows;
    }else{
        $cek = $mysql->query("SELECT no_pegawai FROM pegawai WHERE no_pegawai='$no_pegawai'");
        if ($cek->num_rows > 0) {
            echo '<script>
            alert("Nomor pegawai/ NIK sudah digunakan.!");
            window.location.href="'.$base_url.'admin/tambah_pegawai.php";
        </script>';
        exit();
        } else {
            if ($file['profil']['error'] !== 4) {
                $profil = uploadFile($file['profil']);
                unlink('../file/' . $profilLama);
            }else{
                $profil = $profilLama;
            }
            $mysql->query("UPDATE pegawai SET no_pegawai= '$no_pegawai',nama_pegawai= '$nama_pegawai', tempat_lahir= '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin= '$jenis_kelamin', posisi_jabatan= '$posisi_jabatan', profil='$profil', password='$password',qr_code='$qr', update_at = '$updated_at' WHERE no_pegawai = '$noPegawaiLama'");
            return $mysql->affected_rows;
        } 
    }


}

function tambahAbsen($data){
    global $mysql, $base_url;
    $tanggal = $data['tanggal'];
    $mysql->query("INSERT INTO absen (tanggal) VALUES ('$tanggal')
    ");
    return $mysql->affected_rows;

}
function editAbsen($data){
    global $mysql;
    $id_absen = $data['id_absen'];
    $tanggal = $data['tanggal'];
    $mysql->query("UPDATE absen SET tanggal='$tanggal' WHERE id_absen =$id_absen");
    return $mysql->affected_rows;

}
function editList($data){
    global $mysql, $base_url;
    $id_list = $data['id_list'];
    $jam_masuk = $data['jam_masuk'];
    
    $jam_keluar = $data['jam_keluar'];
    if ($jam_keluar === '00:00:00') {
        $keluar = null;
    } else {
        $keluar = $jam_keluar;
    }
    if ($jam_masuk === '00:00:00') {
        $masuk = null;
    } else {
        $masuk = $jam_masuk;
    }
    
    $status = $data['status'];
    $mysql->query("UPDATE list_absen SET jam_masuk='$masuk', jam_keluar='$keluar', status='$status' WHERE id_list =$id_list");
    return $mysql->affected_rows;

}

// upload file
function uploadFile($file)
{
    // global $base_url;
    $namaFile = $file['name'];
    $tmpFile = $file['tmp_name'];
    $x = explode('.', $namaFile);
    $extensiFile =  strtolower(end($x));
    $extBenar = array('jpg', 'png', 'jpeg');
    $angakaRandom = rand();
    $namaFileBaru = $angakaRandom . '.' . $extensiFile;

    $simpanFile  = '../file/' . $namaFileBaru;
    if (in_array($extensiFile, $extBenar) == true) {
        if (move_uploaded_file($tmpFile, $simpanFile)) {
            return $namaFileBaru;
        } else {
            echo "
            <script>
            alert('gambar gagal di upload');
            window.location.href = window.location.href;
            </script>";
        }
        exit;
    } else {
        echo "
            <script>
            alert('format file tidak di ijinkan hanya boleh jpg,jpeg,png atau pdf');
            window.location.href = window.location.href;
        </script>";
        exit;
    }
}


function qrCodeGen($data){
    // global $base_url;
    $tempdir="../qr_code/";
    if (!file_exists($tempdir))
    mkdir($tempdir, 0755);
    $file_name=date("Ymd").rand().".png";   
    $file_path = $tempdir.$file_name;

    QRcode::png($data, $file_path, "H", 6, 4);

    return $file_name;
}

function cekAbsenMasuk($data){
    global $mysql;
    $id_absen = $data['id'];
    $no_pegawai = $data['no_pegawai'];

    $pesan = "";

    $cek = $mysql->query("SELECT * FROM list_absen WHERE id_absen = $id_absen AND no_pegawai= '$no_pegawai' AND  jam_masuk != '' ");
    if ($cek->num_rows > 0) {
      $pesan = "Sudah Absen Masuk";
    } else {
        $masuk =date("H:i:s");
        $abs = $mysql->query("INSERT INTO list_absen (id_absen,no_pegawai,jam_masuk,status) VALUES ('$id_absen', '$no_pegawai', '$masuk','Hadir')");
      if ($mysql->affected_rows > 0) {
        $pesan ="Absen Masuk Berhasil";
      } else {
        $pesan ="Absen Masuk Gagal";
      }
    }

    return $pesan;
    
}
function cekAbsenKeluar($data){
    global $mysql;
    $id_absen = $data['id'];
    $no_pegawai = $data['no_pegawai'];
    $pesan = "";

    $cek = $mysql->query("SELECT * FROM list_absen WHERE id_absen = $id_absen AND no_pegawai= '$no_pegawai'");
    if ($cek->num_rows > 0) {
        $data = $cek->fetch_assoc();
        if ($data['jam_keluar'] != '') {
            $pesan = 'Sudah Absen Keluar';
        } else {
            $keluar =date("H:i:s");
            $id_list = $data['id_list'];
            $mysql->query("UPDATE list_absen SET jam_keluar = '$keluar' WHERE id_list=$id_list");
            if ($mysql->affected_rows > 0) {
                $pesan ="Absen Keluar Berhasil";
              } else {
                $pesan ="Absen Keluar Gagal";
              }
        }
    } else {
      
        $pesan ="Absen Masuk Dulu";

    }

    return $pesan;
    
}

