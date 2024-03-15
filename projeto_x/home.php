<?php
global $conn;

require_once "./connect.php";
require_once "./session.php";

$sql = "SELECT * FROM USUARIOS";

$result = sqlsrv_fetch_array(sqlsrv_query($conn, $sql), SQLSRV_FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/estrada.svg" type="image/x-icon">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <header>
        <nav class="nav">
            <a href="./home.php" class="imagem_nav col-1">
                <img src="./images/logo_nome_branco.png" alt="logotipo simples da empresa e-vias">
            </a>
            <a href="#" class="perfil col-10" ><?php echo $result['NOME_USER']; ?></a>
            <img src="./images/user_icon.svg" alt="Foto do usuário" class="foto_usuario" >
        </nav>
    </header>

    <div class="form_links" >
        <div class="form">
            <img src="images/icon_form22.svg" alt="Form 22">
            <a class="nav-link" href="./form22.php">FORMULÁRIO 22 - RECEBIMENTO DE AMOSTRAS</a>
        </div>
        
        <div class="form">
            <img src="images/icon_form23.svg" alt="Form 23">
            <a class="nav-link" href="./form23.php">FORMULÁRIO 23 - RECEBIMENTO E IDENTIFICAÇÃO DE AMOSTRAS</a>
        </div>

        <div class="form">
            <img src="images/icon_form24.svg" alt="Form 24">
            <a class="nav-link" href="./formConfig/form24/form24.php">FORMULÁRIO 24 - ETIQUETA DE IDENFICAÇÃO DE AMOSTRA</a>
        </div>

        <div class="form">
            <img src="images/icon_form45.svg" alt="Form 45">
            <a class="nav-link" href="#">FORMULÁRIO 45 - FICHA DE APROVAÇÃO DE SERVIÇO (FAS)</a>
        </div>
    </div>

    <footer>
        <div class="footer">
            <p class="status">Status: <!--status--></p>
        </div>
    </footer>
</body>
</html>