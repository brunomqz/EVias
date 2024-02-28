<?php

// CAMINHO DA CONEXÃO COM BANCO DE DADOS
include("./connect.php");

// RECEBE OS DADOS DO FORMULÁRIO 22
$fmaterial = isset($_POST['fmaterial']) ? $_POST['fmaterial'] : '';
$fvolume = isset($_POST['fvolume']) ? $_POST['fvolume'] : '';
$fprocedencia = isset($_POST['fprocedencia']) ? $_POST['fprocedencia'] : '';
$fcliente = isset($_POST['fcliente']) ? $_POST['fcliente'] : '';
$fentrega = isset($_POST['fentrega']) ? $_POST['fentrega'] : '';
$frecebe = isset($_POST['frecebe']) ? $_POST['frecebe'] : '';
// $signatureSend = isset($_POST['signatureSend']) ? $_POST['signatureSend'] : '';


// RECEBE OS DADOS DO FORMULÁRIO 23
$ffinalidade = isset($_POST['ffinalidade']) ? $_POST['ffinalidade'] : '';
$fproposta_comercial = isset($_POST['fproposta_comercial']) ? $_POST['fproposta_comercial'] : '';
$fdescricao_obra = isset($_POST['fdescricao_obra']) ? $_POST['fdescricao_obra'] : '';
$fresp_lab = isset($_POST['fresp_lab']) ? $_POST['fresp_lab'] : '';
$fresp_amostragem = isset($_POST['fresp_amostragem']) ? $_POST['fresp_amostragem'] : '';
$fnum_projeto = isset($_POST['fnum_projeto']) ? $_POST['fnum_projeto'] : '';
$fdata_coleta = isset($_POST['fdata_coleta']) ? $_POST['fdata_coleta'] : '';
$flocal_amostragem = isset($_POST['flocal_amostragem']) ? $_POST['flocal_amostragem'] : '';
$fpeso = isset($_POST['fpeso']) ? $_POST['fpeso'] : '';
$famostra_pode_ser_ensaiada = isset($_POST['famostra_pode_ser_ensaiada']) ? $_POST['famostra_pode_ser_ensaiada'] : '';
$fquantidade_suficiente = isset($_POST['fquantidade_suficiente']) ? $_POST['fquantidade_suficiente'] : '';
$fobservacao = isset($_POST['fobservacao']) ? $_POST['fobservacao'] : '';





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

echo'<script>window.location.replace("http://localhost:8080/home.html")</script>';



