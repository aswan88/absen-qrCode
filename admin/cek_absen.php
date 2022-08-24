<?php 
require '../function.php';


if (isset($_POST)) {

    if ($_POST['absen'] == 'AM') {
        $data = cekAbsenMasuk($_POST);
    } else {
        $data = cekAbsenKeluar($_POST);
    }
    

    echo json_encode($data);
}

?>