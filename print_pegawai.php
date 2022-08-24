<?php
 include 'function.php';

 if (isset($_GET['data'])) {
    $data = getDataById('pegawai', 'no_pegawai', $_GET['data']);
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print Profil Pegawai</title>
</head>
<style>
    body{
        margin: auto;
        padding: 20px;
        text-align: center;
        justify-content: center;
    }
    table{
        text-align: center;
        margin: auto;
    }
</style>
<body>

                <img src="<?=  'file/'. $data['profil']; ?>" alt="Profile" width="250">
                <h1><u><?= $data['nama_pegawai']; ?></u></h1>
                <h3 style="margin-top: -20px;"><i><?= $data['posisi_jabatan']; ?></i></h3>
                <img src="<?=  'qr_code/'. $data['qr_code']; ?>" alt="Profile" width="250">
                <h2><i>NO PEGAWAI : <?= $data['no_pegawai']; ?></i></h2>
    <script>
        window.print();
    </script>
</body>
</html>