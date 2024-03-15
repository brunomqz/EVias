<?php 

require_once "./connect.php";

session_start();

if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['pass']) == true)) 
{
    echo '<script>alert("Sessão expirada! Entre novamente.")</script>';
    echo '<script>window.location.replace("http://localhost:8080/index.html")</script>';
    echo '<script> console.log("Deu errado!!!"); </script>';
    $status = "Disconnected";
} 

else 
{
    $status = "Connected";

    $teste = file_get_contents('./home.php');
    $teste = str_replace('<!--status-->', $status, $teste);
}


