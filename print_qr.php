<?php
 include 'function.php';

 if (isset($_GET['data'])) {
    $data = $_GET['data'];
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print QR CODE</title>
</head>
<style>
    body{
        margin: 0;
        padding: 20px;
    }
    img{
        width: 400px;
    }
</style>
<body>
    <img src="<?= 'qr_code/'.$data; ?>" alt="QR CODE">

    <script>
        window.print();
    </script>
</body>
</html>