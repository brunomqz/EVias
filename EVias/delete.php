<?php

require_once "./connect.php";

$data_recebe =  isset($_POST['data_recebe'])    ? $_POST['data_recebe']     : ''; 
$protocolo =    isset($_POST['protocolo'])      ? $_POST['protocolo']       : '';

if (isset($data_recebe) and isset($protocolo)) {
    $stmt = " DELETE FROM AMOSTRA WHERE PROTOCOLO_REC = '$protocolo' AND DATA_RECEBE = '$data_recebe'";
} else {
    echo "DEU RUIM MEU IRMÃO!!!";
    die;
}

$result = sqlsrv_query($conn, $stmt);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

// header('location:./home.php');
