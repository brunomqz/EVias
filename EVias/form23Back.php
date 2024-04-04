<?php

require_once "./connect.php";
require_once "./protocolosBack.php";
require_once "./verificaLog.php";

session_start();

$sql = "SELECT * FROM USUARIOS WHERE NOME_USER = '" . $_SESSION['username'] . "' AND SENHA = '" . $_SESSION['pass'] . "'";

$busca_user = sqlsrv_fetch_array( sqlsrv_query( $conn, $sql), SQLSRV_FETCH_ASSOC);

$protocolo = isset($_POST['protocolo']) ? $_POST['protocolo'] : '';
$data_recebe = isset($_POST['data_recebe']) ? $_POST['data_recebe'] : '';

$sql = "SELECT * FROM AMOSTRA 
        WHERE 
        PROTOCOLO_REC = '$protocolo'
        AND
        DATA_RECEBE = '$data_recebe'";

$result = sqlsrv_query($conn, $sql);

$cabecalho = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

$cont = 1;
