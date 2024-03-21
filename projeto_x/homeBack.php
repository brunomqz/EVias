<?php

require_once "./connect.php";
require_once "./session.php";

$sql = "SELECT * FROM USUARIOS";

$result = sqlsrv_fetch_array(sqlsrv_query($conn, $sql), SQLSRV_FETCH_ASSOC);
