<?php

require_once "./connect.php";

$material =     isset($_GET['material'])       ? $_GET['material']        : ''; 
$protocolo =    isset($_GET['protocolo'])      ? $_GET['protocolo']       : '';

echo $material;
echo $protocolo;

$stmt = "   DELETE FROM AMOSTRA 
            WHERE MATERIAL = '$material' 
            AND PROTOCOLO_REC = '$protocolo'";

$result = sqlsrv_query($conn, $stmt);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

// header('location:./protocolos.php');
