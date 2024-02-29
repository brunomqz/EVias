<?php 

include("./connect.php");

session_start();

$login = $_POST["username"];
$password = $_POST["pass"];
$logar = $_POST["logar"];

$_SESSION['username'] = $login;
$_SESSION['pass'] = $password;

$fazpergunta = sqlsrv_fetch(sqlsrv_query($conn, "SELECT * FROM USUARIOS WHERE NOME_USER = '$login' AND SENHA = '$password'"));

if ($fazpergunta === true) {
    echo '<script>alert("Bem-vindo.")</script>';
    echo '<script>window.location.replace("http://localhost:8080/home.php")</script>';
} else {
    echo '<script>alert("Credenciais erradas, favor tentar novamente.")</script>';
    echo '<script>window.location.replace("http://localhost:8080/index.html")</script>';
}








