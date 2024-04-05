<?php 

require_once "./connect.php";
require_once "./verificaLog.php";

session_start();

$sql = "SELECT * FROM USUARIOS WHERE NOME_USER = '" . $_SESSION['username'] . "' AND SENHA = '" . $_SESSION['pass'] . "'";

$busca_user = sqlsrv_fetch_array(sqlsrv_query( $conn, $sql), SQLSRV_FETCH_ASSOC);

$sql = "SELECT DATA_RECEBE, CLIENTE, PROCEDENCIA, PROPOSTA_COMERCIAL, PROTOCOLO_REC 
        FROM AMOSTRA 
        GROUP BY DATA_RECEBE, CLIENTE, PROCEDENCIA, PROPOSTA_COMERCIAL, PROTOCOLO_REC";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}
