<?php

require_once "./connect.php";
require_once "./protocolosBack.php";
require_once "./verificaLog.php";


session_start();

$busca_user = sqlsrv_fetch_array( sqlsrv_query( $conn,"SELECT * FROM USUARIOS"), SQLSRV_FETCH_ASSOC);

$protocolo =    isset($_GET['protocolo'])   ?   $_GET['protocolo']    :     '';
$material =     isset($_GET['material'])    ?   $_GET['material']     :     '';

$sql = "SELECT * FROM AMOSTRA WHERE PROTOCOLO_REC = '$protocolo' AND MATERIAL = '$material'";

$result = sqlsrv_query($conn, $sql);

$cabecalho = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

$cont = 1;
