<!-- ESTRUTURA DE CONFIGURAÇÃO PARA FAZER A BUSCA NO BANCO DE DADOS -->
<?php 

// CONEXÃO COM BANCO
require_once ".\connect.php";

$sql = "SELECT * FROM FORM_22";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}



// DELETAR DADOS
if (isset($_GET['ID_FORM_22'])) {
    $id = $_GET['ID_FORM_22'];
    $delete = sqlsrv_query($conn, "DELETE FROM FORM_22 WHERE ID_FORM_22 ='$id'");
    header("location:./recebimentoAmostras.php");
}


// if((!isset ($_SESSION['username']) == true) and (!isset($_SESSION['password']) == true)) {
//     echo '<script>window.location.replace("http://localhost:8000/recebimentoAmostras.php")</script>';
// }

// $logged = $_SESSION['username'];

?>




<!-- ESTRUTURA HTML DO SITE  -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE -->
    <link rel="stylesheet" href=".\style\style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Recebimento e identificação de amostras de amostras</title>
</head>

<body>

    <!-- Menu de navegação -->
    <header>
        <nav class="nav">
            <a href="login.html" class="imagem_nav">
                <img src=".\images\logo_nome_branco.png" alt="logotipo branco da empresa e-vias">
            </a>
            <a class="nav-link" href="home.html">Página Inicial</a>
        </nav>
    </header>

    <!-- TITLE -->
    <div class="list-group list-group-horizontal titulo">
        <div class="col"></div>
        <h1 class="display-5">FORMULÁRIO 23 - RECEBIMENTO E IDENTIFICAÇÃO DE AMOSTRAS</h1>
        <div class="col"></div>
    </div>


    <form action="./send23.php" method="post">
        
    </form>
     

    <!-- Formulário para inserção dos dados -->
    <div class="formulario">
        <form action="./send.php" method="post" class="list-group">
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
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
                <label>9. ASSINATURA DO ENTREGADOR</label>
                <br>
                <canvas id="signatureCanvas" name="signatureCanvas" class="signatureCanvas" onclick="canvasConfig.js" ></canvas>
                <script src="C:\Users\Bruno\OneDrive\Área de Trabalho\projeto_x\canvasConfig.js"></script>
                <input type="hidden" id="signatureSend" name="signatureSend" >
            </div>


            <!-- SUBMIT BUTTON -->
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <input type="submit" value="Enviar" class="botao">
            </div>

        </form>
    </div>


</body>
</html> 