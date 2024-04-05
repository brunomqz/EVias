<?php

require_once "./connect.php";
require_once "./verificaLog.php";

$data_recebe =  isset($_POST['data_recebe'])    ? $_POST['data_recebe']     : ''; 
$protocolo =    isset($_POST['protocolo'])      ? $_POST['protocolo']       : '';
$motivo =       isset($_POST['motivo'])         ? $_POST['motivo']          : '';
$username =     $_SESSION['username'];
$timezone =     new DateTimeZone('America/Sao_Paulo');
$agora =        new DateTime('now', $timezone);
$agora0 =       $agora -> format('d/m/Y H:i:s');

if (isset($data_recebe) and isset($protocolo)) {
    $stmt =   " DELETE FROM AMOSTRA WHERE PROTOCOLO_REC = '$protocolo' AND DATA_RECEBE = '$data_recebe'";
    $delete = " INSERT INTO ALTERACAO (NOME_USER, PROTOCOLO, MOTIVO, DATA_ALTERACAO) 
                VALUES ('$username', '$protocolo', '$motivo', '$agora0')";
} else {
    echo "DEU RUIM!!!";
    die;
}

$result = sqlsrv_query($conn, $stmt);

$result1 = sqlsrv_query($conn, $delete);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

if ($result1 === false) {
    die(print_r(sqlsrv_errors(), true));
}

header('location:./home.php');
