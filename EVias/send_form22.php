<?php

require_once "./connect.php";
require_once "./verificaLog.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump($dados);

foreach ($dados['fprotocolo'] as $key => $protocolo) {

    $data_recebe =  $dados['fdata'][$key];
    $protocolo =    $dados['fprotocolo'][$key];
    $material =     $dados['fmaterial'][$key];
    $volume =       $dados['fvolume'][$key];
    $procedencia =  $dados['fprocedencia'][$key];
    $cliente =      $dados['fcliente'][$key];
    $entrega =      $dados['fentrega'][$key];
    $recebedor =    $dados['frecebe'][$key];


    $tsql = "       INSERT INTO AMOSTRA ( 
                    DATA_RECEBE,
                    PROTOCOLO_REC,
                    MATERIAL,
                    VOLUME,
                    PROCEDENCIA,
                    CLIENTE,
                    RESP_ENTREGA,
                    RESP_REC)
                    VALUES (
                    '$data_recebe',
                    '$protocolo',
                    '$material',
                    '$volume',
                    '$procedencia',
                    '$cliente',
                    '$entrega',
                    '$recebedor')";

    $stmt = sqlsrv_query($conn, $tsql);

    if($stmt == false){
        echo 'ERROR!!!' . print_r(sqlsrv_errors(), true);
    } else {
        echo'<script>alert("Lançado com sucesso!!!")</script>';
    }    
}


// unset($fprotocolo, $fdata, $fmaterial, $fvolume, $fprocedencia, $fcliente, $fentrega, $frecebe);

echo'<script>window.location.replace("http://localhost:8080/home.php")</script>';
