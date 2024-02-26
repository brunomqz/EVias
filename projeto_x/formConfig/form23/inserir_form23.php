<!-- ESTRUTURA DE CONFIGURAÇÃO PARA FAZER A BUSCA NO BANCO DE DADOS -->
<?php 

// CONEXÃO COM BANCO
require_once ".\connect.php";

$sql = "SELECT * FROM AMOSTRA";

$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}



// DELETAR DADOS
if (isset($_GET['ID_AMOSTRA'])) {
    $id = $_GET['ID_AMOSTRA'];
    $delete = sqlsrv_query($conn, "DELETE FROM AMOSTRA WHERE ID_AMOSTRA ='$id'");
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



    <div class="formulario" >
        <form action="./send23.php" method="post">
            
        </form>
    </div>
    
     

    <!-- Formulário para inserção dos dados -->
    <div class="formulario">
        <form action="./send.php" method="post" class="list-group">
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>

            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <label for="fdata">1. DATA DO RECEBIMENTO</label>
                <br>
                <input type="date" class="fdata" name="fdata" id="fdata">
            </div>
            

            <!-- SUBMIT BUTTON -->
            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                <input type="submit" value="Enviar" class="botao">
            </div>

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


                <th>EDITAR</th>
                <th>EXCLUIR</th>
                <th>DETALHES</th>
            </tr>

            <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $linha['DATA_RECEBE'] -> format('d/m/y'); ?></td>
                <td><?php echo $linha['CLIENTE']; ?></td>
                <td><?php echo $linha['PROCEDENCIA']; ?></td>
                <td><?php echo $linha['PROPOSTA_COMERCIAL']; ?></td>
                <td><?php echo $linha['PROTOCOLO_REC']; ?></td>

                <!-- EDITAR REGISTRO -->
                <td>
                    <a href="./edita.php?ID_AMOSTRA=<?php echo $linha['ID_AMOSTRA'] ?>">Editar</a>
                </td>
                
                <!-- EXCLUIR REGISTRO -->
                <td>
                    <a href="./form23.php?ID_AMOSTRA=<?php echo $linha['ID_AMOSTRA'] ?>">Excluir</a>
                </td>

                <!-- IMPRIMIR REGISTRO -->
                <td>
                    <a href="./formConfig/form23/detalhes_form23.php?PROTOCOLO_REC=<?php echo $linha['PROTOCOLO_REC'] ?>">Detalhes</a>
                </td>
            </tr>
            <?php endwhile ?> 
        </table>
    </div>



</body>
</html> 