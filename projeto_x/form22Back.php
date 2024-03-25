<?php

require_once "./connect.php";
require_once "./verificaLog.php";

session_start();

$busca_user = sqlsrv_fetch_array( sqlsrv_query( $conn,"SELECT * FROM USUARIOS"), SQLSRV_FETCH_ASSOC);

$sql = "SELECT * FROM AMOSTRA";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}
