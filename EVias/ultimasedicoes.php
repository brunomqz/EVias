<?php 

require_once "./connect.php";
require_once "./verificaLog.php";
require_once "./buscaUser.php";

$sql = "SELECT * FROM ALTERACAO";

$result = sqlsrv_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/ultimasedicoes.css">
    <title>Últimas Edições</title>
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

    <h1>ÚLTIMAS EDIÇÕES REALIZADAS</h1>

    <div class="col">
        <table class="table" border="1">
            <tr>
                <th>ID DA ALTERAÇÃO</th>
                <th>NOME DO USUÁRIO</th>
                <th>PROTOCOLO</th>
                <th>MOTIVO DA ALTERAÇÃO</th>
                <th>DATA DA ALTERAÇÃO</th>
            </tr>
            <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $linha['ID'];?></td>
                <td><?php echo $linha['NOME_USER'];?></td>
                <td><?php echo $linha['PROTOCOLO'];?></td>
                <td><?php echo $linha['MOTIVO'];?></td>
                <td><?php echo $linha['DATA_ALTERACAO'] -> format('d/m/Y H:i:s');?></td>
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