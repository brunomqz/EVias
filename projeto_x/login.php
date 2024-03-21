<?php

require_once "./connect.php";

session_start();

session_regenerate_id(true);

$login = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['pass']) ? $_POST['pass'] : '';

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
    unset($_SESSION['pass']);
    echo 'Deu errado!!!';
    echo '<script>alert("Credenciais erradas, favor tentar novamente.")</script>';
    echo '<script>window.location.replace("http://localhost:8080/index.html")</script>';
}
