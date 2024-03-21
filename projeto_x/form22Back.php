<?php

require_once "./connect.php";
require_once "./delete.php";
require_once "./session.php";

$busca_user = sqlsrv_fetch_array( sqlsrv_query( $conn,"SELECT * FROM USUARIOS"), SQLSRV_FETCH_ASSOC);

$sql = "SELECT * FROM AMOSTRA";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (isset($_GET['ID_AMOSTRA'])) {
    $id = $_GET['ID_AMOSTRA'];
    $delete = sqlsrv_query($conn, "DELETE FROM AMOSTRA WHERE ID_AMOSTRA ='$id'");
    header("location:./form22.php");
}