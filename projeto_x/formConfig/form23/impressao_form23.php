<?php 

include("C:\Users\Bruno\Desktop\projeto_x\connect.php");

// $protocolo = $_GET['PROTOCOLO'];

// $sql = "SELECT * FROM FORM_22 WHERE PROTOCOLO ='$protocolo' ";

// $result = sqlsrv_query($conn, $sql);

// if ($result === false) {
//     die(print_r(sqlsrv_errors()));
// }

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
            <td class="coluna2" ></td>
            <th class="coluna3" >Descrição da obra :</th>
            <td  class="coluna4" ></td>
            <th rowspan="2" class="coluna5" >Número do projeto :</th>
            <td rowspan="2"  class="coluna6" ></td>
        </tr>
        <tr>
            <th>Finalidade :</th>
            <td></td>
            <th>Responsável pela entrega :</th>
            <td></td>
        </tr>
        <tr>
            <th>Proposta comercial / FAS :</th>
            <td></td>
            <th>Responsável pelo recebimento :</th>
            <td></td>
            <th rowspan="3" >Protocolo de recebimento :</th>
            <td rowspan="3" ></td>
        </tr>
        <tr>
            <th>Procedência :</th>
            <td></td>
            <th>Responsável do laboratório :</th>
            <td></td>
        </tr>
        <tr>
            <th>Empresa :</th>
            <td></td>
            <th>Responsável pela amostragem :</th>
            <td></td>
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
        <tr class="linhas" >
            <td class="id colunas" >1</td>
            <td>BRITA 3/4"</td>
            <td>01/01/2024</td>
            <td></td>
            <td>5</td>
            <td>25,0</td>
            <td>
                <label for="SIM">SIM</label>
                <input type="checkbox" id="SIM">
                <label for="NAO">NÃO</label>
                <input type="checkbox" id="NAO">
            </td>
            <td>
                <label for="SIM">SIM</label>
                <input type="checkbox" id="SIM">
                <label for="NAO">NÃO</label>
                <input type="checkbox" id="NAO">
            </td>
        </tr>
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

    <table border="1" class="table">
            <tr>
                <td></td>
            </tr>
    </table>

    

</body>
</html>