<?php require_once 'form22Back.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\style\style.css">
    <link rel="stylesheet" href=".\formConfig\form22\style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
        <form action="./send_form22.php" method="post" class="list-group" >
            <table border="1" class="table table-sm materiais" >
                <tr class="cabecalho" >
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
                    <td><input class="form22" type="date" name="fdata" id="fdata" required></td>
                    <td><input class="form22" type="text" name="fmaterial" id="fmaterial"></td>
                    <td><input class="form22" type="number" name="fvolume" id="fvolume"></td>
                    <td><input class="form22" type="text" name="fprocedencia" id="fprocedencia"></td>
                    <td><input class="form22" type="text" name="fcliente" id="fcliente"></td> 
                    <td><input class="form22" type="text" name="fentrega" id="fentrega"></td>
                    <td><input class="form22" type="text" name="frecebe" id="frecebe"></td>
                    <td><input class="form22" type="text" name="fprotocolo" id="fprotocolo" required></td>
                </tr>       
            </table>
            <!-- ADICIONA MAIS CAMPOS PARA INSERÇÃO NO FORMULÁRIO 22
            <input type="button" onclick="adicionaCampo()" class="form-group botao add" value="+"> -->
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
                <th>EDITAR</th>
                <th>EXCLUIR</th>
                <th>IMPRIMIR</th>
            </tr>

            <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $linha['DATA_RECEBE'] -> format('d/m/y'); ?></td>
                <td><?php echo $linha['MATERIAL']; ?></td>
                <td><?php echo $linha['VOLUME']; ?></td>
                <td><?php echo $linha['PROCEDENCIA']; ?></td>
                <td><?php echo $linha['CLIENTE']; ?></td>
                <td><?php echo $linha['RESP_ENTREGA']; ?></td>
                <td><?php echo $linha['RESP_REC']; ?></td>
                <td><?php echo $linha['PROTOCOLO_REC']; ?></td>
                <td>
                    <a href="./edita.php?ID_AMOSTRA=<?php echo $linha['ID_AMOSTRA'] ?>">Editar</a>
                </td>
                <td>
                    <a href="./form22.php?ID_AMOSTRA=<?php echo $linha['ID_AMOSTRA'] ?>">Excluir</a>
                </td>
                <td>
                    <a href="./formConfig/form22/impressao_form22.php?PROTOCOLO_REC=<?php echo $linha['PROTOCOLO_REC']?>">Imprimir</a>                    
                </td>
            </tr>
            <?php endwhile ?> 
        </table>
    </div>

    

</body>
</html> 