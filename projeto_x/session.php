<?php 

session_start();

$status = 'Connected';

// if ((!isset($_SESSION['username']) == true) and (!isset($_SESSION['pass']) == true)) 
// {
//     echo '<script>alert("Sessão expirada! Entre novamente.")</script>';
//     echo '<script>window.location.replace("http://localhost:8080/index.html")</script>';
//     echo '<script> console.log("Deu errado!!!"); </script>';
//     $status = "Disconnected";
//     session_destroy();
// }

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
