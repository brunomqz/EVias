<?php
 
$servername = "DEV\SQLEXPRESS";
$db = "TEST";
$user = "sa";
$pwd = "DEV\SQLEXPRESS1";

$connection = [
    "Database" => $db,
    "Uid" => $user,
    "PWD" => $pwd
];

$conn = sqlsrv_connect($servername, $connection);
if(!$conn){
    die(print_r(sqlsrv_errors(),true));
}




