<!-- ESTRUTURA DE CONFIGURAÇÃO PARA FAZER A BUSCA NO BANCO DE DADOS -->
<?php 

include("connect.php");

$sql = "SELECT * FROM FORM_22";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}


?>

<!-- ESTRUTURA HTML DO SITE  -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Recebimento de amostras</title>
</head>

<body>

    <!-- Menu de navegação -->
    <header>
        <nav class="nav">
            <a href="login.html" class="imagem_nav">
                <img src="./images/logo_nome_branco.png" alt="logotipo simples da empresa e-vias">
            </a>
            <a class="nav-link" href="index.html">Página Inicial</a>
            <a class="nav-link" href="./recebimentoAmostras.php">Recebimento de Amostras</a>
        </nav>
    </header>

    <!-- TITLE -->
    <div class="list-group list-group-horizontal titulo">
        <div class="col"></div>
        <h1 class="display-5">FORMULÁRIO 22 - CONTROLE DE ENTRADAS DE AMOSTRAS</h1>
        <div class="col"></div>
    </div>

    <!-- Formulário para inserção dos dados -->
    <div class="formulario">
        <form action="./send.php" method="post" class="list-group">
            <div class="form-group col-lg-3 col-md-4 col-sm-12" id="fdata">
                <label for="fdata">1. DATA</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fmaterial">2. MATERIAL</label>
                <br>
                <input type="text" class="fmaterial" name="fmaterial" id="fmaterial">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fvolume">3. VOLUME</label>
                <br>
                <input type="number" name="fvolume" id="fvolume" class="fvolume">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fprocedencia">4. PROCEDÊNCIA</label>
                <br>
                <input type="text" id="fprocedencia" class="fprocedencia" name="fprocedencia">
            </div>  
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fcliente">5. CLIENTE</label>
                <br>
                <input type="text" id="fcliente" class="fcliente" name="fcliente">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fentrega">6. RESPONSÁVEL PELA ENTREGA</label>
                <br>
                <input type="text" id="fentrega" name="fentrega" class="fentrega">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="frecebe">7. RESPONSÁVEL PELO RECEBIMENTO</label>
                <br>
                <input type="text" name="frecebe" class="frecebe" id="frecebe">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fprotocolo">8. PROTOCOLO DE RECEBIMENTO</label>
                <br>
                <input type="text" name="fprotocolo" class="fprotocolo" id="fprotocolo"> 
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">        
                <label for="signatureCanvas">9. ASSINATURA DO ENTREGADOR</label>
                <br>
                <canvas id="signatureCanvas" name="signatureCanvas" class="signatureCanvas"></canvas>
            </div>


            <!-- Configurações do Canvas da assinatura -->
            <!--<script src="canvasConfig.js"></script>-->
            <!------------------------------------------->


            <!-- SUBMIT BUTTON -->
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <input type="submit" value="Enviar" class="botao">
            </div>

        </form>
    </div>



    <!-- TABELA DE DADOS INSERIDOS -->
    <div class="col">
        <table class="table">
            <tr>
                <th>DATA</th>
                <th>MATERIAL</th>
                <th>VOLUME</th>
                <th>PROCEDÊNCIA</th>
                <th>CLIENTE</th>
                <th>ENTREGADOR</th>
                <th>RECEBEDOR</th>
                <th>ASSINATURA</th>
                <th>PROTOCOLO</th>
            </tr>
            <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)):?>
                <tr>
                    <td><?php echo $linha['DATA_RECEBE'] -> format('d/m/y'); ?></td>
                    <td><?php echo $linha['MATERIAL']; ?></td>
                    <td><?php echo $linha['VOLUME']; ?></td>
                    <td><?php echo $linha['PROCEDENCIA']; ?></td>
                    <td><?php echo $linha['CLIENTE']; ?></td>
                    <td><?php echo $linha['NOME_ENTREGADOR']; ?></td>
                    <td><?php echo $linha['RECEBEDOR']; ?></td>
                    <td><?php echo $linha['ASSINATURA']; ?></td>
                    <td><?php echo $linha['PROTOCOLO']; ?></td>
                </tr>
            <?php endwhile ?> 
        </table>
    </div>

</body>
</html> 