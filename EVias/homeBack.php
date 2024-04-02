<?php

require_once "./connect.php";
require_once "./verificaLog.php";

session_start();

$sql = "SELECT * FROM USUARIOS WHERE NOME_USER = '" . $_SESSION['username'] . "' AND SENHA = '" . $_SESSION['pass'] . "'";

$result = sqlsrv_fetch_array(sqlsrv_query($conn, $sql), SQLSRV_FETCH_ASSOC);
