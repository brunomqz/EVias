<?php
global $conn;

// CAMINHO DA CONEXÃO COM BANCO DE DADOS
include("./connect.php");

// RECEBE OS DADOS DO FORMULÁRIO 22
$fprotocolo = isset($_POST['fprotocolo']) ? $_POST['fprotocolo'] : '';
$fdata = isset($_POST['fdata']) ? $_POST['fdata'] : '';
$fmaterial = isset($_POST['fmaterial']) ? $_POST['fmaterial'] : '';
$fvolume = isset($_POST['fvolume']) ? $_POST['fvolume'] : '';
$fprocedencia = isset($_POST['fprocedencia']) ? $_POST['fprocedencia'] : '';
$fcliente = isset($_POST['fcliente']) ? $_POST['fcliente'] : '';
$fentrega = isset($_POST['fentrega']) ? $_POST['fentrega'] : '';
$frecebe = isset($_POST['frecebe']) ? $_POST['frecebe'] : '';


$tsql = "INSERT INTO AMOSTRA (
        PROTOCOLO_REC, 
        DATA_RECEBE, 
        MATERIAL, 
        VOLUME, 
        PROCEDENCIA, 
        CLIENTE, 
        RESP_ENTREGA, 
        ASSINATURA, 
        RESP_REC)

    VALUES (
        '$fprotocolo', 
        '$fdata', 
        '$fmaterial', 
        '$fvolume', 
        '$fprocedencia', 
        '$fcliente', 
        '$fentrega',
        NULL, 
        '$frecebe')";



$stmt = sqlsrv_query($conn, $tsql);

if($stmt == false){
    echo 'ERROR!!!';
} else {
    echo'<script>alert("Lançado com sucesso!!!")</script>';
}

unset($fprotocolo, $fdata, $fmaterial, $fvolume, $fprocedencia, $fcliente, $fentrega, $frecebe);

echo'<script>window.location.replace("http://localhost:8080/home.php")</script>';



