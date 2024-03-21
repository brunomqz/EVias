<?php 

require_once "C:\Users\Bruno\Desktop\projeto_x\connect.php";

$protocolo = isset($_POST['protocolo']) ? $_POST['protocolo'] : '';

$sql = "SELECT * FROM AMOSTRA 
        WHERE PROTOCOLO_REC ='$protocolo'";

$query = sqlsrv_query($conn, $sql);

$result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

$contLinha = 1;

if ($result === false) {
    echo "N/A";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./form23.css">
    <link rel="icon" href="./image/symbol.svg">
    <title>Form 23</title>
</head>
<body>
    <!-- IMPRIME O FORMULÁRIO -->
    <button class="hide-on-print imprimir">
        <a class="imprimir" href="#" onclick="window.print()">IMPRIMIR FORMULÁRIO</a>
    </button>

    <!-- CABEÇALHO DO RELATÓRIO -->
    <table border="1" class="cabecalho">
        <tr>
            <td rowspan="8" ><img src=".\logo_nome.png" alt="Logo"></td>
            <td rowspan="8" class="titulo"><h1>RECEBIMENTO E IDENTIFICAÇÃO DE AMOSTRAS</h1></td>
            <tr>
                <tr class="inform">
                    <td colspan="2">Identificação do doc. N°</td>
                </tr>
                <tr class="inform">
                    <td colspan="2">FORM 023</td>
                </tr>
                <tr class="inform">
                    <td>Emissão</td>
                    <td>Revisão</td>
                </tr>
                <tr class="inform">
                    <td>13/11/2023</td>
                    <td>03</td>
                </tr>
            </tr>
        </tr>   
    </table>

    <!-- REGISTRO -->
    <table border="1" class="divisao"> 
        <td>1. REGISTRO</td>
    </table>

    <table border="1" class="dados">
        <tr>
            <th class="coluna1">Data do recebimento :</th>
            <td class="coluna2"><?php echo $result['DATA_RECEBE'] -> format('d/m/y');?></td>
            <th class="coluna3">Descrição da obra :</th>
            <td  class="coluna4"><?php echo $result['DESCRICAO_OBRA'];?></td>
            <th rowspan="2" class="coluna5">Número do projeto :</th>
            <td rowspan="2"  class="coluna6"><?php echo $result['NUM_PROJETO'];?></td>
        </tr>
        <tr>
            <th>Finalidade :</th>
            <td><?php echo $result['FINALIDADE'];?></td>
            <th>Responsável pela entrega :</th>
            <td><?php echo $result['RESP_ENTREGA'];?></td>
        </tr>
        <tr>
            <th>Proposta comercial / FAS :</th>
            <td><?php echo $result['PROPOSTA_COMERCIAL'];?></td>
            <th>Responsável pelo recebimento :</th>
            <td><?php echo $result['RESP_REC'];?></td>
            <th rowspan="3" >Protocolo de recebimento :</th>
            <td rowspan="3" ><?php echo $result['PROTOCOLO_REC'];?></td>
        </tr>
        <tr>
            <th>Procedência :</th>
            <td><?php echo $result['PROCEDENCIA'];?></td>
            <th>Responsável do laboratório :</th>
            <td><?php echo $result['RESP_LAB'];?></td>
        </tr>
        <tr>
            <th>Empresa :</th>
            <td><?php echo $result['CLIENTE'];?></td>
            <th>Responsável pela amostragem :</th>
            <td><?php echo $result['RESP_AMOSTRAGEM'];?></td>
        </tr>
    </table>   

    <!-- MATERIAIS -->
    <table border="1" class="divisao"> 
        <td>2. MATERIAIS</td>
    </table>

    <table border="1" class="materiais" >
        <tr class="colunas" >
            <th colspan="2">IDENTIFICAÇÃO DA AMOSTRA</th>
            <th>DATA DA COLETA</th>
            <th>LOCAL DA AMOSTRAGEM</th>
            <th>QUANTIDADE DE VOLUME</th>
            <th>PESO (KG)</th>
            <th class="check" >Amostra pode ser ensaiada? (Descrever no campo 3)</th>
            <th class="check" >Quantidade suficiente? (Descrever no campo 3)</th>
        </tr>

        <!-- PEGAR OS DADOS PARA A TABELA -->
        <?php foreach ($result as $query2):?>
        <tr>
            <td class="colunas" ><?php echo $contLinha;?></td>
            <td><?php echo $query2['MATERIAL'];?></td>
            <td><?php echo $query2['DATA_COLETA'] -> format('d/m/y');?></td>
            <td><?php echo $query2['LOCAL_AMOSTRAGEM'];?></td>
            <td><?php echo $query2['VOLUME'];?></td>
            <td><?php echo $query2['PESO'];?></td>
            <td><?php echo $query2['AMOSTRA_PODE_SER_ENSAIADA'];?></td>
            <td><?php echo $query2['QUANTIDADE_SUFICIENTE'];?></td>
        </tr>
        <?php endforeach ?>
        <?php $contLinha++;?>
    </table>

    <!-- NORMAS DE REFERÊNCIA -->
    <table border="1" class="divisao"> 
        <td>2.1 NORMAS DE REFERÊNCIA</td>
    </table>
    
    <table border="1" class="normas_de_referencia"> 
        <td>Normas disponíveis no FORM 045 - Ficha de aprovação de serviço (FAS)</td>
    </table>

    <!-- 3. DESVIOS, ADIÇÕES OU EXCLUSÕES -->
    <table border="1" class="divisao"> 
        <td>3. DESVIOS, ADIÇÕES OU EXCLUSÕES</td>
    </table>

    <table border="1" class="observacao">
            <td><?php echo $result['OBSERVACAO'];?></td>
    </table>
</body>
</html>