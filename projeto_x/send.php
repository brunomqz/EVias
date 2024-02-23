<?php

// CAMINHO DA CONEXÃO COM BANCO DE DADOS
include("./connect.php");

// RECEBE OS DADOS DO FORMULÁRIO
$fprotocolo = isset($_POST['fprotocolo']) ? $_POST['fprotocolo'] : '';
$fdata = isset($_POST['fdata']) ? $_POST['fdata'] : '';
$fmaterial = isset($_POST['fmaterial']) ? $_POST['fmaterial'] : '';
$fvolume = isset($_POST['fvolume']) ? $_POST['fvolume'] : '';
$fprocedencia = isset($_POST['fprocedencia']) ? $_POST['fprocedencia'] : '';
$fcliente = isset($_POST['fcliente']) ? $_POST['fcliente'] : '';
$fentrega = isset($_POST['fentrega']) ? $_POST['fentrega'] : '';
$frecebe = isset($_POST['frecebe']) ? $_POST['frecebe'] : '';
// $signatureSend = isset($_POST['signatureSend']) ? $_POST['signatureSend'] : '';


$tsql = "INSERT INTO FORM_22 (PROTOCOLO, DATA_RECEBE, MATERIAL, VOLUME, PROCEDENCIA, CLIENTE, NOME_ENTREGADOR, ASSINATURA, RECEBEDOR)
        VALUES ('$fprotocolo', '$fdata', '$fmaterial', '$fvolume', '$fprocedencia', '$fcliente', '$fentrega', NULL, '$frecebe')";

$stmt = sqlsrv_query($conn, $tsql);

if($stmt == false){
    echo 'ERROR!!!';
} else {
    echo'<script>alert("Lançado com sucesso!!!")</script>';
}


echo'<script>window.location.replace("http://localhost:8000/form22.php")</script>';



