<?php

require_once "./connect.php";

$material =     isset($_GET['material'])       ? $_GET['material']        : ''; 
$protocolo =    isset($_GET['protocolo'])      ? $_GET['protocolo']       : '';

echo $material;
echo $protocolo;

if (isset($material)) {
    $stmt = " DELETE FROM AMOSTRA WHERE PROTOCOLO_REC = '$protocolo' AND MATERIAL = '$material'";
    
} else {
    $stmt = " DELETE FROM AMOSTRA WHERE PROTOCOLO_REC = '$protocolo'";
}



$result = sqlsrv_query($conn, $stmt);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

header('location:./home.php');
