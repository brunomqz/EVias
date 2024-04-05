<?php 

require_once 'connect.php';
require_once 'audit.php';
require_once 'verificaLog.php';

$protocolo = isset($_POST['protocolo']) ? $_POST['protocolo'] : '';
$username = $_SESSION['username'];
$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';

$timezone = new DateTimeZone('America/Sao_Paulo');
$agora = new DateTime('now', $timezone);
$agora0 = $agora -> format('d/m/Y H:i:s');

$sql = "INSERT INTO ALTERACAO (NOME_USER, PROTOCOLO, MOTIVO, DATA_ALTERACAO) 
        VALUES ('$username', '$protocolo', '$motivo', '$agora0')";

$query = sqlsrv_query($conn, $sql);

if ($query != true) {
    echo "Deu errado!!! ";
    die(print_r(sqlsrv_errors(), true));
} else {
    header('location:protocolos.php');
}
