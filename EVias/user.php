<?php require_once "userBack.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style/user.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Usuário</title>
</head>
<body>
    <header>
        <nav class="nav">
            <a href="login.html" class="imagem_nav col-1">
                <img src="./images/logo_nome_branco.png" alt="logotipo simples da empresa e-vias">
            </a>
            <div class="col-1">
                <a class="nav-link pagina_inicial" href="home.php">Home</a>
            </div>
            <div class="col-9"></div>
            <div class="col-1 perfil">
                <a href="#"><?php echo $result['NOME_USER']; ?></a>
            </div>
        </nav>
    </header>
    <div class="photoUser">
        <img src="./images/user_icon_black.svg">
        <h1 class="nameUser" ><?php echo $result['NOME_USER'];?></h1>
    </div>  
</body>
</html>