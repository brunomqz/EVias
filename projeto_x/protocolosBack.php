<?php 

require_once "./connect.php";
require_once "./session.php";

$busca_user = sqlsrv_fetch_array(sqlsrv_query($conn, "SELECT * FROM USUARIOS"), SQLSRV_FETCH_ASSOC);

$sql = "SELECT DATA_RECEBE, CLIENTE, PROCEDENCIA, PROPOSTA_COMERCIAL, PROTOCOLO_REC, MATERIAL 
        FROM AMOSTRA 
        GROUP BY DATA_RECEBE, CLIENTE, PROCEDENCIA, PROPOSTA_COMERCIAL, PROTOCOLO_REC, MATERIAL";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (isset($_GET['PROTOCOLO_REC'])) {
    $id = $_GET['PROTOCOLO_REC'];
    $delete = sqlsrv_query($conn, "DELETE FROM AMOSTRA WHERE PROTOCOLO_REC ='$id'");
    header("location:./form23.php");
}
