<?php

require_once "./connect.php";
require_once "./verificaLog.php";

session_start();

$sql = "SELECT * FROM USUARIOS";

$result = sqlsrv_fetch_array(sqlsrv_query($conn, $sql), SQLSRV_FETCH_ASSOC);
