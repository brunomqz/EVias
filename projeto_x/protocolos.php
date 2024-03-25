<?php require_once 'protocolosBack.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <link rel="stylesheet" href=".\style\style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Recebimento e identificação de amostras de amostras</title>
</head>
<body>
    <header>
        <nav class="nav">
            <a href="./home.php" class="imagem_nav col ">
                <img src="./images/logo_nome_branco.png" alt="logotipo simples da empresa e-vias">
            </a>
            <a class="nav-link pagina_inicial" href="home.php">Home</a>
            <a href="#" class="perfil col"><?php echo $busca_user['NOME_USER'];?></a>
        </nav>
    </header>

    <div class="list-group list-group-horizontal titulo">
        <div class="col"></div>
        <h1 class="display-5">RECEBIMENTO E IDENTIFICAÇÃO DE AMOSTRAS</h1>
        <div class="col"></div>
    </div>

    <div class="formulario">
        <form action="./send23.php" method="post">

        </form>
    </div>

    <div class="col">
        <table class="table">
            <tr>
                <th>DATA DO RECEBIMENTO</th>
                <th>CLIENTE</th>
                <th>PROCEDÊNCIA</th>
                <th>PROPOSTA COMERCIAL</th>
                <th>PROTOCOLO DE RECEBIMENTO</th>
                <th>MATERIAL</th>
                <th>IMPRIMIR</th>
                <th>EDITAR</th>
                <th>EXCLUIR</th>
            </tr>

            <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $linha['DATA_RECEBE']->format('d/m/y');?></td>
                    <td><?php echo $linha['CLIENTE'];?></td>
                    <td><?php echo $linha['PROCEDENCIA'];?></td>
                    <td><?php echo $linha['PROPOSTA_COMERCIAL'];?></td>
                    <td><?php echo $linha['PROTOCOLO_REC'];?></td>
                    <td><?php echo $linha['MATERIAL'];?></td>
                    <td>
                        <form action="./formConfig/form23/detalhes_form23.php" method="post">
                            <input type="hidden" name="protocolo" id="protocolo" value="<?php echo $linha['PROTOCOLO_REC'];?>">
                            <input type="submit" class="protocolos" value="Imprimir">
                        </form>
                    </td>
                    <td>
                        <form action="./form23.php" method="get">
                            <input type="hidden" name="material" id="material" value="<?php echo $linha['MATERIAL'];?>">
                            <input type="hidden" name="protocolo" id="protocolo" value="<?php echo $linha['PROTOCOLO_REC'];?>">
                            <input type="submit" class="protocolos" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="./delete.php" method="get">
                            <input type="hidden" name="material" id="material" value="<?php echo $linha['MATERIAL'];?>">
                            <input type="hidden" name="protocolo" id="protocolo" value="<?php echo $linha['PROTOCOLO_REC'];?>">     
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
