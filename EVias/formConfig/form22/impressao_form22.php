<?php 

include("C:\Users\Bruno\Desktop\projeto_x\connect.php");

$protocolo = $_POST['protocolo'];

$sql = "SELECT * FROM AMOSTRA WHERE PROTOCOLO_REC ='$protocolo' ";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors()));
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./form22.css">

    <link rel="icon" href="./image/symbol.svg">
    
    <title>Form_22</title>
</head>
<body>

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

    <!-- DADOS -->
    <table border="1" class="table">
            <tr class="colunas">
                <th class="col">DATA</th>
                <th class="col">MATERIAL</th>
                <th class="col">QUANTIDADE DE VOLUME</th>
                <th class="col">PROCEDÊNCIA</th>
                <th class="col">CLIENTE</th>
                <th class="col">RESPONSÁVEL PELA ENTREGA</th>
                <th class="col">ASSINATURA</th>
                <th class="col">RESPONSÁVEL PELO RECEBIMENTO</th>
                <th class="col">PROTOCOLO DE RECEBIMENTO</th>
            </tr>
            <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $linha['DATA_RECEBE'] -> format('d/m/y');?></td>
                <td><?php echo $linha['MATERIAL'];?></td>
                <td><?php echo $linha['VOLUME'];?></td>
                <td><?php echo $linha['PROCEDENCIA'];?></td>
                <td><?php echo $linha['CLIENTE'];?></td>
                <td><?php echo $linha['RESP_REC'];?></td>
                <td><?php echo $linha['ASSINATURA'];?></td>
                <td><?php echo $linha['RESP_ENTREGA'];?></td>
                <td><?php echo $linha['PROTOCOLO_REC'];?></td>
            </tr>
            <?php endwhile ?> 
    </table>

    

</body>
</html>