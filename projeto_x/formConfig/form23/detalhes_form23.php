<?php 

include("C:\Users\Bruno\Desktop\projeto_x\connect.php");


$protocolo = $_GET['PROTOCOLO_REC'];

$sql = "SELECT * FROM AMOSTRA WHERE PROTOCOLO_REC ='$protocolo' ";

$result = sqlsrv_query($conn, $sql);

$result2 = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

$contLinha = 1;


if ($result === false) {
    echo "N/A";
}

// echo '<script>alert("APERTE Ctrl + P PARA IMPRIMIR")</script>';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./form23.css">

    <link rel="icon" href="./image/symbol.svg">
    
    <title>Form_23</title>
</head>
<body>
   


    <!-- IMPRIME O FORMULÁRIO -->
    <button class="hide-on-print imprimir" value="" >
        <a class="imprimir" href="#" onclick="window.print()">IMPRIMIR FORMULÁRIO</a>
    </button>

    <!-- CABEÇALHO DO RELATÓRIO -->
    <table border="1" class="cabecalho">
        <tr>
            <td rowspan="8" ><img src=".\logo_nome.png" alt="Logo"></td>
            <td rowspan="8" class="titulo" ><h1>RECEBIMENTO E IDENTIFICAÇÃO DE AMOSTRAS</h1></td>
            <tr>
                <tr class="inform">
                    <td colspan="2" >Identificação do doc. N°</td>
                </tr>
                <tr class="inform">
                    <td colspan="2" >FORM 023</td>
                </tr>
                <tr class="inform" >
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

    <table border="1" class="dados" >
        <tr>
            <th class="coluna1" >Data do recebimento :</th>
            <td class="coluna2" ><?php echo $result2['DATA_RECEBE'] -> format('d/m/y') ; ?></td>
            <th class="coluna3" >Descrição da obra :</th>
            <td  class="coluna4" ><?php echo $result2['DESCRICAO_OBRA'] ;?></td>
            <th rowspan="2" class="coluna5" >Número do projeto :</th>
            <td rowspan="2"  class="coluna6" ><?php echo $result2['NUM_PROJETO']; ?></td>
        </tr>
        <tr>
            <th>Finalidade :</th>
            <td><?php echo $result2['FINALIDADE']; ?></td>
            <th>Responsável pela entrega :</th>
            <td><?php echo $result2['RESP_ENTREGA']; ?></td>
        </tr>
        <tr>
            <th>Proposta comercial / FAS :</th>
            <td><?php echo $result2['PROPOSTA_COMERCIAL']; ?></td>
            <th>Responsável pelo recebimento :</th>
            <td><?php echo $result2['RESP_REC']; ?></td>
            <th rowspan="3" >Protocolo de recebimento :</th>
            <td rowspan="3" ><?php echo $result2['PROTOCOLO_REC']; ?></td>
        </tr>
        <tr>
            <th>Procedência :</th>
            <td><?php echo $result2['PROCEDENCIA']; ?></td>
            <th>Responsável do laboratório :</th>
            <td><?php echo $result2['RESP_LAB']; ?></td>
        </tr>
        <tr>
            <th>Empresa :</th>
            <td><?php echo $result2['CLIENTE']; ?></td>
            <th>Responsável pela amostragem :</th>
            <td><?php echo $result2['RESP_AMOSTRAGEM']; ?></td>
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
        <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)):?>
            <tr>
                <td class="colunas" ><?php echo $contLinha; ?></td>
                <td><?php echo $linha['MATERIAL']; ?></td>
                <td><?php echo $linha['DATA_COLETA'] ; ?></td>
                <td><?php echo $linha['LOCAL_AMOSTRAGEM']; ?></td>
                <td><?php echo $linha['VOLUME']; ?></td>
                <td><?php echo $linha['PESO']; ?></td>
                <td><?php echo $linha['AMOSTRA_PODE_SER_ENSAIADA']; ?></td>
                <td><?php echo $linha['QUANTIDADE_SUFICIENTE']; ?></td>
            </tr>
            <?php $contLinha++; ?>
            <?php endwhile ?> 
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
            <td><?php echo $result2['OBSERVACAO'];?></td>
    </table>

    

</body>
</html>