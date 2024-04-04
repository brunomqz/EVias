<?php   
    require_once 'connect.php';
    require_once 'verificaLog.php';

    $protocolo = isset($_GET['PROTOCOLO_REC']) ? $_GET['PROTOCOLO_REC'] : '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/audit.css">
    <script src="./alteracao.js"></script>
    <title>Audit</title>
</head>
<body>
    <div class="comentario">
        <form action="auditBack.php" method="post">
            <input type="hidden" name="protocolo" value="<?php echo $protocolo;?>">
            <input type="hidden" name="username" value="<?php $_SESSION['username'];?>">
        
            <div class="titulo">
                <h1>Motivo da alteração do protocolo <?php echo $protocolo;?> :</h1>
            </div>
            <div>
                <input type="text" id="motivo" name="motivo" placeholder="Escreva aqui..." >
            </div>
            <div class="botoes">
                <a href="./home.php">
                    <button class="botao" id="cancelar">Cancelar</button>
                </a>
                <input type="submit" class="botao" id="enviar" value="Enviar">    
            </div>
        </form>
        
    </div>
</body>
</html>
