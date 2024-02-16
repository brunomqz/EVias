<?php 

include("./connect.php");

$login = $_POST["username"];
$password = $_POST["pass"];
$logar = $_POST["logar"];


$fazpergunta = sqlsrv_fetch(sqlsrv_query($conn, "SELECT * FROM USUARIOS WHERE NOME_USER = '$login' AND SENHA = '$password'"));

if ($fazpergunta >= 0) {
    echo '<script>alert("Bem-vindo.")</script>';
    echo '<script>window.location.replace("http://localhost:8000/index.html")</script>';
} else {
    echo '<script>alert("Credenciais erradas, favor tentar novamente.")</script>';
    echo '<script>window.location.replace("http://localhost:8000/login.html")</script>';
}








