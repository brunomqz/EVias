<?php 

include("connect.php");

$protocolo = $_GET['PROTOCOLO'];

$sql = "SELECT * FROM FORM_22 WHERE PROTOCOLO ='$protocolo' ";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors()));
}



// echo '<script>alert("APERTE Ctrl + P PARA IMPRIMIR")</script>';

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
    <table border="1" class="titulo">
        <td><img src="./images/logo_nome.png" alt=""></td>
        <td class="titulo" ><h1>CONTROLE DE ENTRADA DE AMOSTRAS</h1></td>
        <td class="inform">
            <table border="1" class="identificacao" >
                <td colspan="2" >Identificação do doc. Nº</td>
                <tr>
                    <td colspan="2" >FORM 022</td>
                </tr>
                <tr>
                    <td>Emissão</td>
                    <td>Revisão</td>
                </tr>
                <tr>
                    <td>13/11/2023</td>
                    <td>01</td>
                </tr>
            </table>
        </td>       
    </table>

    <!-- DADOS -->
    <table border="1" class="table">
            <tr class="cabecalho">
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
                <td><?php echo $linha['DATA_RECEBE'] -> format('d/m/y'); ?></td>
                <td><?php echo $linha['MATERIAL']; ?></td>
                <td><?php echo $linha['VOLUME']; ?></td>
                <td><?php echo $linha['PROCEDENCIA']; ?></td>
                <td><?php echo $linha['CLIENTE']; ?></td>
                <td><?php echo $linha['NOME_ENTREGADOR']; ?></td>
                <td><?php echo $linha['ASSINATURA']; ?></td>
                <td><?php echo $linha['RECEBEDOR']; ?></td>
                <td><?php echo $linha['PROTOCOLO']; ?></td>
            </tr>
            <?php endwhile ?> 
    </table>

    

</body>
</html>