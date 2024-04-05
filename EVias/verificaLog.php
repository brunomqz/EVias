<?php

session_start();

if ((!isset ($_SESSION['username']) == true) and (!isset($_SESSION['pass']) == true)) {
    session_write_close();
    header("location:./login.html");
}

$log = $_SESSION['username'];

if ($log == true) {
    $status = "Connected";
} else {
    $status = "Disconnected";
    unset($_SESSION);
}
