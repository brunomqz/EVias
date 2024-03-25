<?php

session_start();

if ((!isset ($_SESSION['username']) == true) and (!isset($_SESSION['pass']) == true)) {
    session_write_close();
    header("location:./index.html");
}

$log = $_SESSION['username'];

if ($log == true) {
    $status = "Connected";
} else {
    $status = "Disconnected";
}
