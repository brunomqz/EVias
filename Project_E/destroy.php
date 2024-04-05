<?php 

require_once "connect.php";
require_once "verificaLog.php";

session_start();

session_destroy();

header('location:./home.php');
