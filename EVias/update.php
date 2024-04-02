<?php

include "./connect.php";
require_once "./verificaLog.php";

// PEGA O ID DO ITEM A SER EDITADO 
$fid = isset($_POST['fid']) ? $_POST['fid'] : '';

// PEGA INFORMAÇÕES INSERIDAS NOS CAMPOS 
$fdata = isset($_POST['fdata']) ? $_POST['fdata'] : '';
$fmaterial = isset($_POST['fmaterial']) ? $_POST['fmaterial'] : '';
$fvolume = isset($_POST['fvolume']) ? $_POST['fvolume'] : '';
$fprocedencia = isset($_POST['fprocedencia']) ? $_POST['fprocedencia'] : '';
$fcliente = isset($_POST['fcliente']) ? $_POST['fcliente'] : '';
$fentrega = isset($_POST['fentrega']) ? $_POST['fentrega'] : '';
$frecebe  = isset($_POST['frecebe']) ? $_POST['frecebe'] : '';
$fprotocolo = isset($_POST['fprotocolo']) ? $_POST['fprotocolo'] : '';


$tsql = "UPDATE FORM_22 
        SET DATA_RECEBE = '$fdata',
        MATERIAL = '$fmaterial',
        VOLUME = '$fvolume',
        PROCEDENCIA = '$fprocedencia',
        CLIENTE = '$fcliente',
        NOME_ENTREGADOR = '$fentrega',
        RECEBEDOR = '$frecebe',
        PROTOCOLO = '$fprotocolo'
        WHERE ID_FORM_22 = '$fid'";

$stmt = sqlsrv_query($conn, $tsql);

if( $stmt === false ) {
    echo 'ERROR!!!';
} else {
    echo'<script>alert("Alterado com sucesso!!!")</script>';
}


echo'<script>window.location.replace("http://localhost:8000/recebimentoAmostras.php")</script>';

