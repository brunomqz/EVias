<?php require_once 'form22Back.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\formConfig\form22\style.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="./functions.js"></script>
    <title>Recebimento de amostras</title>
</head>

<body>
    <header>
        <nav class="nav">
            <a href="./home.php" class="imagem_nav col ">
                <img src="./images/logo_nome_branco.png" alt="logotipo simples da empresa e-vias">
            </a>
            <a class="nav-link pagina_inicial" href="home.php">Home</a>
            <a href="#" class="perfil col" ><?php echo $busca_user['NOME_USER']; ?></a>
        </nav>
    </header>

    <!-- TITLE -->
    <div class="list-group list-group-horizontal titulo">
        <div class="col"></div>
        <h1 class="display-5">FORMULÁRIO 22 - CONTROLE DE ENTRADAS DE AMOSTRAS</h1>
        <div class="col"></div>
    </div>

    <div class="formulario">
        <form action="./send_form22.php" method="post" class="list-group">
            <table border="1" class="table table-sm materiais">
                <tr class="cabecalho">
                    <th></th>
                    <th>DATA</th>
                    <th>MATERIAL</th>
                    <th>VOLUME</th>
                    <th>PROCEDÊNCIA</th>
                    <th>CLIENTE</th>
                    <th>RESPONSÁVEL PELA ENTREGA</th>
                    <th>RESPONSÁVEL PELO RECEBIMENTO</th>
                    <th>PROTOCOLO DE RECEBIMENTO</th>
                </tr>
                <tr id="camposAdd" >
                    <td><button class="delCampo" onclick="delCampos()">X</button></td>
                    <td><input class="form22" type="date" name='fdata[]' id="fdata" required></td>
                    <td><input class="form22" type="text" name='fmaterial[]' id="fmaterial"></td>
                    <td><input class="form22" type="number" name='fvolume[]' id="fvolume"></td>
                    <td><input class="form22" type="text" name='fprocedencia[]' id="fprocedencia"></td>
                    <td><input class="form22" type="text" name='fcliente[]' id="fcliente"></td> 
                    <td><input class="form22" type="text" name='fentrega[]' id="fentrega"></td>
                    <td><input class="form22" type="text" name='frecebe[]' id="frecebe"></td>
                    <td><input class="form22" type="text" name='fprotocolo[]' id="fprotocolo" required></td>
                </tr>
                <tr>
                    <!-- CAMPO PARA ASSINATURA
                    <script src="canvas.js"></script>
                    <td colspan="9"><canvas id="signatureCanvas" class="signature"></canvas></td> -->
                </tr>

            </table>
            <input class="addCampo" type="button" onclick="addCampos()" value="+">
            <br>
            <input type="submit" class="form-group botao" value="Enviar"> 
        </form>
    </div>
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
                <th>PROTOCOLO</th>
                <th>IMPRIMIR</th>
                <th>EXCLUIR</th>
            </tr>

            <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $linha['DATA_RECEBE'] -> format('d/m/y');?></td>
                <td><?php echo $linha['MATERIAL']; ?></td>
                <td><?php echo $linha['VOLUME']; ?></td>
                <td><?php echo $linha['PROCEDENCIA']; ?></td>
                <td><?php echo $linha['CLIENTE']; ?></td>
                <td><?php echo $linha['RESP_ENTREGA']; ?></td>
                <td><?php echo $linha['RESP_REC']; ?></td>
                <td><?php echo $linha['PROTOCOLO_REC']; ?></td>
                <td>
                    <form action="./formConfig/form22/impressao_form22.php" method="post">
                        <input type="hidden" name="protocolo" id="protocolo" value="<?php echo $linha['PROTOCOLO_REC'];?>">
                        <input type="submit" class="protocolos" value="Imprimir">
                    </form>
                </td>
                <td>
                    <form action="./delete.php" method="post">
                        <input type="hidden" name="protocolo" id="protocolo" value="<?php echo $linha['PROTOCOLO_REC'];?>"> 
                        <input type="hidden" name="data_recebe" id="data_recebe" value="<?php echo $linha['DATA_RECEBE'] -> format('d/m/Y');?>">
                        <input type="hidden" name="motivo" id="motivo" value="<?php echo "Exclusão de formulário";?>">
                        <input type="submit" class="protocolos" value="Excluir">
                    </form>
                </td>
            </tr>
            <?php endwhile ?> 
        </table>
    </div>
    <footer>
        <div class="footer">
            <p class="status">Status: <?php echo $status;?></p>
        </div>
    </footer>
</body>
</html> 