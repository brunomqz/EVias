<?php 

include("./connect.php");

$id = isset($_GET['PROTOCOLO']) ? $_GET['PROTOCOLO'] : '';

$update = sqlsrv_fetch(sqlsrv_query($conn, "SELECT * FROM FORM_22 WHERE PROTOCOLO = '$id'"));

if ($update === false) {
    die(print_r(sqlsrv_errors(), true));
}


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
    <div class="formulario">
        <form action="./update.php" method="post" class="list-group">
            <div class="form-group col-lg-3 col-md-4 col-sm-12" id="fdata">
                <label for="xdata">1. DATA</label>
                <br>
                <input type="date" class="xdata" name="xdata" id="xdata">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="xmaterial">2. MATERIAL</label>
                <br>
                <input type="text" class="xmaterial" name="xmaterial" id="xmaterial">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="xvolume">3. VOLUME</label>
                <br>
                <input type="number" name="xvolume" id="xvolume" class="xvolume">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="xprocedencia">4. PROCEDÊNCIA</label>
                <br>
                <input type="text" id="xprocedencia" class="xprocedencia" name="xprocedencia">
            </div>  
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="xcliente">5. CLIENTE</label>
                <br>
                <input type="text" id="xcliente" class="xcliente" name="xcliente">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="xentrega">6. RESPONSÁVEL PELA ENTREGA</label>
                <br>
                <input type="text" id="xentrega" name="xentrega" class="xentrega">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="xrecebe">7. RESPONSÁVEL PELO RECEBIMENTO</label>
                <br>
                <input type="text" name="xrecebe" class="xrecebe" id="xrecebe">
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="xprotocolo">8. PROTOCOLO DE RECEBIMENTO</label>
                <br>
                <input type="text" name="xprotocolo" class="xprotocolo" id="xprotocolo"
                value="<?php echo $update['PROTOCOLO'];?> "> 
            </div>
        
            <!-- SUBMIT BUTTON -->
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <input type="submit" value="Enviar" class="botao">
            </div>

        </form>
    </div>

</body>
</html>