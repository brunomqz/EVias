<?php

require_once "./connect.php";
require_once "./verificaLog.php";
require_once "./buscaUser.php";

session_start();

$sql = "SELECT * FROM AMOSTRA";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}
