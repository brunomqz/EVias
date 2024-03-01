<?php

// CAMINHO DA CONEXÃO COM BANCO DE DADOS
include("./connect.php");

// RECEB O ID DO FORMULÁRIO
$fprotocolo = isset($_POST['fprotocolo']) ? $_POST['fprotocolo'] : '';


// RECEBE OS DADOS DO FORMULÁRIO 23
$ffinalidade = isset($_POST['ffinalidade']) ? $_POST['ffinalidade'] : '';
$fproposta_comercial = isset($_POST['fproposta_comercial']) ? $_POST['fproposta_comercial'] : '';
$fdescricao_obra = isset($_POST['fdescricao_obra']) ? $_POST['fdescricao_obra'] : '';
$fresp_lab = isset($_POST['fresp_lab']) ? $_POST['fresp_lab'] : '';
$fresp_amostragem = isset($_POST['fresp_amostragem']) ? $_POST['fresp_amostragem'] : '';
$fprojeto = isset($_POST['fprojeto']) ? $_POST['fprojeto'] : '';
$fdata_coleta = isset($_POST['fdata_coleta']) ? $_POST['fdata_coleta'] : '';
$flocal_amostragem = isset($_POST['flocal_amostragem']) ? $_POST['flocal_amostragem'] : '';
$fpeso = isset($_POST['fpeso']) ? $_POST['fpeso'] : '';
$famostra_pode_ser_ensaiada = isset($_POST['ensaiar_amostra']) ? $_POST['ensaiar_amostra'] : '';
$fquantidade_suficiente = isset($_POST['quantidade_suficiente']) ? $_POST['quantidade_suficiente'] : '';
$fobservacao = isset($_POST['fobservacao']) ? $_POST['fobservacao'] : '';


// FAZ QUERY PARA O BANCO DE DADOS
$tsql = "UPDATE AMOSTRA
        SET 
        FINALIDADE = '$ffinalidade',
        PROPOSTA_COMERCIAL = '$fproposta_comercial',
        DESCRICAO_OBRA = '$fdescricao_obra',
        RESP_LAB = '$fresp_lab',
        RESP_AMOSTRAGEM = '$fresp_amostragem',
        NUM_PROJETO = '$fprojeto',
        DATA_COLETA = '$fdata_coleta',
        LOCAL_AMOSTRAGEM = '$flocal_amostragem',
        PESO = '$fpeso',
        AMOSTRA_PODE_SER_ENSAIADA = '$famostra_pode_ser_ensaiada',
        QUANTIDADE_SUFICIENTE = '$fquantidade_suficiente',
        OBSERVACAO = '$fobservacao'
        WHERE PROTOCOLO_REC = '$fprotocolo'";



$stmt = sqlsrv_query($conn, $tsql);

if($stmt == false){
    die( print_r( sqlsrv_errors(), true));
} else {
    echo'<script>alert("Lançado com sucesso!!!")</script>';
}

// unset($fprotocolo, $fdata, $fmaterial, $fvolume, $fprocedencia, $fcliente, $fentrega, $frecebe);

// echo'<script>window.location.replace("http://localhost:8080/home.php")</script>';



