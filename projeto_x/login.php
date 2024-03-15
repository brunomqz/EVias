<?php
global $conn;

require_once "./connect.php";

session_start();

$login = $_POST["username"];
$password = $_POST["pass"];

$testLogin = sqlsrv_query($conn, "SELECT * FROM USUARIOS WHERE NOME_USER = '$login' AND SENHA = '$password'");

if (sqlsrv_has_rows($testLogin) > 0)
{
    $_SESSION['username'] = $login;
    $_SESSION['pass'] = $password;
    echo 'Deu certo!!!';
    echo '<script>alert("Bem-vindo.")</script>';
    echo '<script>window.location.replace("http://localhost:8080/home.php")</script>';
}

else
{
    unset($_SESSION['username']);
    unset($_SESSION['username']);
    echo 'Deu errado!!!';
    echo '<script>alert("Credenciais erradas, favor tentar novamente.")</script>';
    echo '<script>window.location.replace("http://localhost:8080/index.html")</script>';
}
