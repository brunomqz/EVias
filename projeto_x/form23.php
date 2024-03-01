<!-- ESTRUTURA DE CONFIGURAÇÃO PARA FAZER A BUSCA NO BANCO DE DADOS -->
<?php 

// CONEXÃO COM BANCO
require_once ".\connect.php";

$busca_user = sqlsrv_fetch_array( sqlsrv_query( $conn,"SELECT * FROM USUARIOS"), SQLSRV_FETCH_ASSOC);


$sql = "SELECT DATA_RECEBE, CLIENTE, PROCEDENCIA, PROPOSTA_COMERCIAL, PROTOCOLO_REC FROM AMOSTRA 
        GROUP BY DATA_RECEBE, CLIENTE, PROCEDENCIA, PROPOSTA_COMERCIAL, PROTOCOLO_REC";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}



// DELETAR DADOS
if (isset($_GET['PROTOCOLO_REC'])) {
    $id = $_GET['PROTOCOLO_REC'];
    $delete = sqlsrv_query($conn, "DELETE FROM AMOSTRA WHERE PROTOCOLO_REC ='$id'");
    header("location:./form23.php");
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>

    <!-- STYLE -->
    <link rel="stylesheet" href=".\style\style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Recebimento e identificação de amostras de amostras</title>
</head>

<body>

    <!-- Menu de navegação -->
    <header>
        <nav class="nav">
            <a href="./home.php" class="imagem_nav col ">
                <img src="./images/logo_nome_branco.png" alt="logotipo simples da empresa e-vias">
            </a>
            <a class="nav-link pagina_inicial" href="home.php">Home</a>
            <a href="#" class="perfil col" ><?php echo $busca_user['NOME_USER']; ?></a>
            <img src="./images/user_icon.svg" alt="Foto do usuário" class="foto_usuario col-0.8" >
        </nav>
    </header>

    <!-- TITLE -->
    <div class="list-group list-group-horizontal titulo">
        <div class="col"></div>
        <h1 class="display-5">FORMULÁRIO 23 - RECEBIMENTO E IDENTIFICAÇÃO DE AMOSTRAS</h1>
        <div class="col"></div>
    </div>



    <div class="formulario" >
        <form action="./send23.php" method="post">

        </form>
    </div>


    <!-- TABELA DE DADOS INSERIDOS -->
    <div class="col">
        <table class="table">
            <tr>
                <th>DATA DO RECEBIMENTO</th>
                <th>CLIENTE</th>
                <th>PROCEDÊNCIA</th>
                <th>PROPOSTA COMERCIAL</th>
                <th>PROTOCOLO DE RECEBIMENTO</th>
                <th>DETALHES</th>
                <th>EDITAR</th>
                <th>EXCLUIR</th>
            </tr>

            <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $linha['DATA_RECEBE'] -> format('d/m/y');?></td>
                <td><?php echo $linha['CLIENTE']; ?></td>
                <td><?php echo $linha['PROCEDENCIA']; ?></td>
                <td><?php echo $linha['PROPOSTA_COMERCIAL']; ?></td>
                <td><?php echo $linha['PROTOCOLO_REC']; ?></td>
                <td>
                    <a href="./formConfig/form23/detalhes_form23.php?PROTOCOLO_REC=<?php echo $linha['PROTOCOLO_REC']; ?>">Detalhes</a>
                </td>
                <td>
                    <a href="./inserir_form23.php?PROTOCOLO_REC=<?php echo $linha['PROTOCOLO_REC'];?>">Editar</a>
                </td>
                <td>
                    <a href="./form23.php?PROTOCOLO_REC=<?php echo $linha['PROTOCOLO_REC']; ?>">Excluir</a>
                </td>
            </tr>
                
            <?php endwhile ?> 
        </table>
    </div>
    

</body>
</html> 