<?php 

include "./connect.php";

$id = isset($_GET['PROTOCOLO_REC']) ? $_GET['PROTOCOLO_REC'] : '';

$update = sqlsrv_query($conn, "SELECT * FROM FORM_22 WHERE PROTOCOLO_REC = '$id'");

if ($update === false) {
    die(print_r(sqlsrv_errors(), true));
    
}

$linha = sqlsrv_fetch_array($update);
