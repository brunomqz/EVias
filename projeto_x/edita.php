<?php 

include("./connect.php");

$id = isset($_GET['ID_FORM_22']) ? $_GET['ID_FORM_22'] : '';

$update = sqlsrv_query($conn, "SELECT * FROM FORM_22 WHERE ID_FORM_22 = '$id'");

if ($update === false) {
    die(print_r(sqlsrv_errors(), true));
    
}

$linha = sqlsrv_fetch_array($update);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Editar</title>
</head>
<body>
    <!-- MENU DE NAVEGAÇÃO -->
    <header>
        <nav class="nav">
            <a href="login.html" class="imagem_nav">
                <img src="./images/logo_nome_branco.png" alt="logotipo simples da empresa e-vias">
            </a>
            <a class="nav-link" href="index.html">Página Inicial</a>
            <a class="nav-link" href="recebimentoAmostras.php">Recebimento de Amostras</a>
        </nav>
    </header>


    <!-- TITLE -->
    <div class="list-group list-group-horizontal titulo">
        <div class="col"></div>
        <h1 class="display-5">EDIÇÃO - FORMULÁRIO 22</h1>
        <div class="col"></div>
    </div>

    <!-- Formulário para inserção dos dados -->
    <div class="formUpdate">
        <form action="./update.php" method="post" class="list-group">

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata"
                value="<?php echo $linha['DATA_RECEBE'] -> format('d/m/y'); ?>">
            </div>
                
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fmaterial">2. MATERIAL</label>
                <br>
                <input type="text" class="fmaterial" name="fmaterial" id="fmaterial"
                value="<?php echo $linha['MATERIAL']; ?>">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fvolume">3. VOLUME</label>
                <br>
                <input type="number" name="fvolume" id="fvolume" class="fvolume"
                value="<?php echo $linha['VOLUME']; ?>">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fprocedencia">4. PROCEDÊNCIA</label>
                <br>
                <input type="text" id="fprocedencia" class="fprocedencia" name="fprocedencia"
                value="<?php echo $linha['PROCEDENCIA']; ?>">
            </div>  

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fcliente">5. CLIENTE</label>
                <br>
                <input type="text" id="fcliente" class="fcliente" name="fcliente"
                value="<?php echo $linha['CLIENTE']; ?>">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fentrega">6. RESPONSÁVEL PELA ENTREGA</label>
                <br>
                <input type="text" id="fentrega" name="fentrega" class="fentrega"
                value="<?php echo $linha['NOME_ENTREGADOR']; ?>">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="frecebe">7. RESPONSÁVEL PELO RECEBIMENTO</label>
                <br>
                <input type="text" name="frecebe" class="frecebe" id="frecebe"
                value="<?php echo $linha['RECEBEDOR']; ?>">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fprotocolo">8. PROTOCOLO DE RECEBIMENTO</label>
                <br>
                <input type="text" name="fprotocolo" class="fprotocolo" id="fprotocolo"
                value="<?php echo $linha['PROTOCOLO']; ?>"> 
            </div>

            <!-- SELECIONA O ID DO ITEM A SER EDITADO -->
            <div>
                <input name="fid" id="fid" type="hidden" value="<?php echo $linha['ID_FORM_22']; ?>" >
            </div>
        
            <!-- SUBMIT BUTTON -->
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <input type="submit" value="Enviar" class="botao">
            </div>

        </form>
    </div>

</body>
</html>