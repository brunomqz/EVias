<!-- ESTRUTURA DE CONFIGURAÇÃO PARA FAZER A BUSCA NO BANCO DE DADOS -->
<?php 

// CONEXÃO COM BANCO
require_once "C:\Users\Bruno\Desktop\projeto_x\connect.php";

$busca_user = sqlsrv_fetch_array( sqlsrv_query( $conn,"SELECT * FROM USUARIOS"), SQLSRV_FETCH_ASSOC);


$id = isset($_GET['PROTOCOLO_REC']) ? $_GET['PROTOCOLO_REC'] : '';

$sql = "SELECT * FROM AMOSTRA WHERE PROTOCOLO_REC = '$id'";

$result = sqlsrv_query($conn, $sql);

$cabecalho = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);


if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}


$cont = 1;



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
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Recebimento e identificação de amostras</title>
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

    <!-- TITLE -->
    <div class="list-group list-group-horizontal titulo">
        <div class="col"></div>
        <h1 class="display-5">FORMULÁRIO 23 - RECEBIMENTO E IDENTIFICAÇÃO DE AMOSTRAS</h1>
        <div class="col"></div>
    </div>


    


    <!-- 1. REGISTRO -->


    <!-- Formulário para inserção dos dados -->
    <div class="formulario">
        <form action="./send_form23.php" method="post" class="list-group">

            <!-- REGISTRO -->
            <h3 class="grupo">1. REGISTRO</h3>


            <!-- Linha 1 -->
            <div class="row col-lg-12 col-md-12 col-sm-12" >
                <div class="form-group col ">
                    <label for="fdata">DATA DO RECEBIMENTO</label>
                    <br>
                    <input type="text" class="registro" name="fdata" id="fdata" value="<?php echo $cabecalho['DATA_RECEBE'] -> format('d/m/y') ; ?>">
                </div>
                
                <div class="form-group col ">
                    <label for="ffinalidade">FINALIDADE</label>
                    <br>
                    <input type="text" class="registro" name="ffinalidade" id="ffinalidade" value="<?php echo $cabecalho['FINALIDADE']; ?>" >
                </div>

                <div class="form-group col ">
                    <label for="fproposta_comercial">PROPOSTA COMERCIAL/FAS</label>
                    <br>
                    <input type="text" class="registro" name="fproposta_comercial" id="fproposta_comercial" value="<?php echo $cabecalho['PROPOSTA_COMERCIAL']; ?>">
                </div>
            </div>

            <!-- Linha 2 -->
            <div class="row col-lg-12 col-md-12 col-sm-12" >
                <div class="form-group col ">
                    <label for="fprocedencia">PROCEDÊNCIA</label>
                    <br>
                    <input type="text" class="registro" name="fprocedencia" id="fprocedencia" value="<?php echo $cabecalho['PROCEDENCIA']; ?>">
                </div>
                
                <div class="form-group col ">
                    <label for="fcliente">EMPRESA</label>
                    <br>
                    <input type="text" class="registro" name="fcliente" id="fcliente" value="<?php echo $cabecalho['CLIENTE']; ?>">
                </div>

                <div class="form-group col ">
                    <label for="fdescricao_obra">DESCRIÇÃO DA OBRA</label>
                    <br>
                    <input type="text" class="registro" name="fdescricao_obra" id="fdescricao_obra"value="<?php echo $cabecalho['DESCRICAO_OBRA']; ?>">
                </div>
            </div>

            <!-- Linha 3 -->
            <div class="row col-lg-12 col-md-12 col-sm-12" >
                <div class="form-group col ">
                    <label for="fresp_entrega">RESPONSÁVEL PELA ENTREGA</label>
                    <br>
                    <input type="text" class="registro" name="fresp_entrega" id="fresp_entrega" value="<?php echo $cabecalho['RESP_ENTREGA']; ?>">
                </div>
                
                <div class="form-group col ">
                    <label for="fresp_rec">RESPONSÁVEL PELO RECEBIMENTO</label>
                    <br>
                    <input type="text" class="registro" name="fresp_rec" id="fresp_rec" value="<?php echo $cabecalho['RESP_REC']; ?>">
                </div>

                <div class="form-group col ">
                    <label for="fresp_lab">RESPONSÁVEL DO LABORATÓRIO</label>
                    <br>
                    <input type="text" class="registro" name="fresp_lab" id="fresp_lab" value="<?php echo $cabecalho['RESP_LAB']; ?>">
                </div>

                <div class="form-group col ">
                    <label for="fresp_amostragem">RESPONSÁVEL PELA AMOSTRAGEM</label>
                    <br>
                    <input type="text" class="registro" name="fresp_amostragem" id="fresp_amostragem" value="<?php echo $cabecalho['RESP_AMOSTRAGEM']; ?>">
                </div>
            </div>

            <!-- Linha 4 -->
            <div class="row col-lg-12 col-md-12 col-sm-12" >
                <div class="form-group col ">
                    <label for="fprojeto">NÚMERO DO PROJETO</label>
                    <br>
                    <input type="text" class="registro" name="fprojeto" id="fprojeto" value="<?php echo $cabecalho['NUM_PROJETO']; ?>">
                </div>
                
                <div class="form-group col ">
                    <label for="fprotocolo">PROTOCOLO DE RECEBIMENTO</label>
                    <br>
                    <input type="text" class="registro" name="fprotocolo" id="fprotocolo" value="<?php echo $cabecalho['PROTOCOLO_REC']; ?>">
                </div>
            </div>
            
            <!-- MATERIAIS -->
            <h3 class="grupo">2. MATERIAIS</h3>

            <table border="1" class="table table-sm materiais" >
                <tr class="cabecalho" >
                    <th colspan="2" >IDENTIFICAÇÃO DA AMOSTRA</th>
                    <th>DATA DA COLETA</th>
                    <th>LOCAL DA AMOSTRAGEM</th>
                    <th>QUANTIDADE DE VOLUME</th>
                    <th>PESO (KG)</th>
                    <th>AMOSTRA PODE SER ENSAIADA?
                        <br> (Descrever no campo 3)</th>
                    <th>QUANTIDADE SUFICIENTE?
                        <br> (Descrever no campo 3)</th>
                </tr>

                
                <?php while ($linha = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)): ?>
                <tr>
                    <td class="cabecalho" ><?php echo $cont++; ?></td>
                    <td><input type="text" id="materiais" value="<?php echo $linha['MATERIAL'];?>"></td>
                    <td><input type="date" name="" id="materiais" value="<?php echo $linha['DATA_COLETA'] -> format('d/m/y') ;?>"></td>
                    <td><input type="text" id="materiais" value="<?php echo $linha['LOCAL_AMOSTRAGEM']; ?>"></td>
                    <td><input type="number" name="" id="materiais" value="<?php echo $linha['VOLUME']; ?>"></td>
                    <td><input type="text" id="materiais" value="<?php echo $linha['PESO']; ?>"></td>
                    <td><input type="text" name="ensaiar_amostra" id="materiais" value="<?php echo $linha['AMOSTRA_PODE_SER_ENSAIADA']; ?>" ></td>
                    <td><input type="text" name="quantidade_suficiente" id="materiais" value="<?php echo $linha['QUANTIDADE_SUFICIENTE']; ?>" ></td>
                </tr>
                <?php endwhile; ?>
            </table>


            <!-- MATERIAIS -->
            <h3 class="grupo">2.1 NORMAS DE REFERÊNCIA</h3>
            <P class="normas">Normas disponíveis no FORM 045 - Ficha de Aprovação de Serviço (FAS)</P>

            
            <!-- DESVIOS, ADIÇÕES OU EXCLUSÕES -->
            <h3 class="grupo">3. DESVIOS, ADIÇÕES OU EXCLUSÕES</h3>
            <textarea name="desvios" class="desvios"  id=""></textarea>
            
            <input type="submit" class="botao" >


        </form>
    </div>

</body>
</html> 