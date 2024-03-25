<?php

require_once './connect.php';
require_once "./verificaLog.php";


$data_recebe =                              isset($_POST['fdata'])                  ? $_POST['fdata']                   : '';
$protocolo_rec =                            isset($_POST['fprotocolo'])             ? $_POST['fprotocolo']              : '';
$material =                                 isset($_POST['fmaterial'])              ? $_POST['fmaterial']               : '';
$volume =                                   isset($_POST['fvolume'])                ? $_POST['fvolume']                 : '';
$procedencia =                              isset($_POST['fprocedencia'])           ? $_POST['fprocedencia']            : '';
$cliente =                                  isset($_POST['fcliente'])               ? $_POST['fcliente']                : '';
$resp_entrega =                             isset($_POST['fresp_entrega'])          ? $_POST['fresp_entrega']           : '';
$resp_rec =                                 isset($_POST['fresp_rec'])              ? $_POST['fresp_rec']               : '';

$finalidade =                               isset($_POST['ffinalidade'])            ? $_POST['ffinalidade']             : '';
$proposta_comercial =                       isset($_POST['fproposta_comercial'])    ? $_POST['fproposta_comercial']     : '';
$descricao_obra =                           isset($_POST['fdescricao_obra'])        ? $_POST['fdescricao_obra']         : '';
$resp_lab =                                 isset($_POST['fresp_lab'])              ? $_POST['fresp_lab']               : '';
$resp_amostragem =                          isset($_POST['fresp_amostragem'])       ? $_POST['fresp_amostragem']        : '';
$projeto =                                  isset($_POST['fprojeto'])               ? $_POST['fprojeto']                : '';
$data_coleta =                              isset($_POST['fdata_coleta'])           ? $_POST['fdata_coleta']            : '';
$local_amostragem =                         isset($_POST['flocal_amostragem'])      ? $_POST['flocal_amostragem']       : '';
$peso =                                     isset($_POST['fpeso'])                  ? $_POST['fpeso']                   : '';
$amostra_pode_ser_ensaiada =                isset($_POST['ensaiar_amostra'])        ? $_POST['ensaiar_amostra']         : '';
$quantidade_suficiente =                    isset($_POST['quantidade_suficiente'])  ? $_POST['quantidade_suficiente']   : '';
$observacao =                               isset($_POST['fobservacao'])            ? $_POST['fobservacao']             : '';

$tsql = "                                   UPDATE AMOSTRA
                                            SET 
                                            DATA_RECEBE =                           '$data_recebe',
                                            MATERIAL =                              '$material',
                                            VOLUME =                                '$volume',
                                            PROCEDENCIA =                           '$procedencia',
                                            CLIENTE =                               '$cliente',
                                            RESP_ENTREGA =                          '$resp_entrega',
                                            RESP_REC =                              '$resp_rec',

                                            FINALIDADE =                            '$finalidade',
                                            PROPOSTA_COMERCIAL =                    '$proposta_comercial',
                                            DESCRICAO_OBRA =                        '$descricao_obra',
                                            RESP_LAB =                              '$resp_lab',
                                            RESP_AMOSTRAGEM =                       '$resp_amostragem',
                                            NUM_PROJETO =                           '$projeto',
                                            DATA_COLETA =                           '$data_coleta',
                                            LOCAL_AMOSTRAGEM =                      '$local_amostragem',
                                            PESO =                                  '$peso',
                                            AMOSTRA_PODE_SER_ENSAIADA =             '$amostra_pode_ser_ensaiada',
                                            QUANTIDADE_SUFICIENTE =                 '$quantidade_suficiente',
                                            OBSERVACAO =                            '$observacao'
                                            WHERE 
                                            PROTOCOLO_REC =                         '$protocolo_rec'
                                            AND
                                            MATERIAL =                              '$material'";

$stmt = sqlsrv_query($conn, $tsql);

if($stmt == false) {
    echo "Deu errado!!!";
    die( print_r( sqlsrv_errors(), true));
} else {
    echo'<script>alert("Lançado com sucesso!!!")</script>';
}

echo'<script>window.location.replace("http://localhost:8080/home.php")</script>';
