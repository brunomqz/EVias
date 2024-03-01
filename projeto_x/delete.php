<?php 

require_once "./connect.php";

$protocolo = isset($_POST['PROTOCOLO_REC']) ? $_POST['PROTOCOLO_REC'] : '';

if (isset($_POST["PROTOCOLO_REC"])) {
    $stmt = "SELECT * FROM AMOSTRA WHERE PROTOCOLO_REC = '$protocolo'";

    $result = sqlsrv_query($conn, $stmt);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    
    }
}