<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM 45</title>
</head>
<body>
    <!-- Menu de navegação -->
    <header>
        <nav class="nav">
            <a href="login.html" class="imagem_nav col ">
                <img src="./images/logo_nome_branco.png" alt="logotipo simples da empresa e-vias">
            </a>
            <a class="nav-link pagina_inicial" href="home.php">Home</a>
            <a href="#" class="perfil col" ><?php echo $busca_user['NOME_USER']; ?></a>
            <img src="./images/user_icon.svg" alt="Foto do usuário" class="foto_usuario col-0.8" >
        </nav>
    </header>
</body>
</html>