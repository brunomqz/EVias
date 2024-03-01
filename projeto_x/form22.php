<!-- ESTRUTURA DE CONFIGURAÇÃO PARA FAZER A BUSCA NO BANCO DE DADOS -->
<?php 

// CONEXÃO COM BANCO
require_once "./connect.php";
require_once "./delete.php";

$busca_user = sqlsrv_fetch_array( sqlsrv_query( $conn,"SELECT * FROM USUARIOS"), SQLSRV_FETCH_ASSOC);

$sql = "SELECT * FROM AMOSTRA";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}



// DELETAR DADOS
if (isset($_GET['ID_AMOSTRA'])) {
    $id = $_GET['ID_AMOSTRA'];
    $delete = sqlsrv_query($conn, "DELETE FROM AMOSTRA WHERE ID_AMOSTRA ='$id'");
    header("location:./form22.php");
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
    <link rel="stylesheet" href=".\formConfig\form22\style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Recebimento de amostras</title>
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
                    <td><input class="form22" type="text" name="fmaterial" id="fmaterial" ></td>
                    <td><input class="form22" type="number" name="fvolume" id="fvolume" ></td>
                    <td><input class="form22" type="text" name="fprocedencia" id="fprocedencia" ></td>
                    <td><input class="form22" type="text" name="fcliente" id="fcliente" ></td> 
                    <td><input class="form22" type="text" name="fentrega" id="fentrega" ></td>
                    <td><input class="form22" type="text" name="frecebe" id="frecebe" ></td>
                    <td><input class="form22" type="text" name="fprotocolo" id="fprotocolo" required></td>
                </tr>       
            </table>
            <script src="./adiciona.js" ></script>  
            <input type="button" onclick="adicionaCampo()" class="form-group botao add" value="+" >
            <input type="submit" class="form-group botao" value="Enviar" >
        </form>
    </div>


    <!-- TABELA DE DADOS INSERIDOS -->
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
                <th>ASSINATURA</th>
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
                <td><?php echo $linha['ASSINATURA']; ?></td>
                <td><?php echo $linha['PROTOCOLO_REC']; ?></td>

                <!-- EDITAR REGISTRO -->
                <td>
                    <a href="./edita.php?ID_AMOSTRA=<?php echo $linha['ID_AMOSTRA'] ?>">Editar</a>
                </td>
                
                <!-- EXCLUIR REGISTRO -->
                <td>
                    <a href="./form22.php?ID_AMOSTRA=<?php echo $linha['ID_AMOSTRA'] ?>">Excluir</a>
                </td>

                <!-- IMPRIMIR REGISTRO -->
                <td>
                    <a href="./formConfig/form22/impressao_form22.php?PROTOCOLO_REC=<?php echo $linha['PROTOCOLO_REC']?>">Imprimir</a>                    
                </td>
            </tr>
            <?php endwhile ?> 
        </table>
    </div>

    

</body>
</html> 