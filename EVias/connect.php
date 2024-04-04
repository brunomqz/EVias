<?php

//$dsn = 'sqlsrv=host:localhost;dbname:TEST';
//try 
//{
//    $pdo = new PDO($dsn, 'sa', 'DEV\SQLEXPRESS1');
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Cool!!!";
//} 
//catch(PDOException $e) 
//{
//    echo 'ERRO!!!' . $e->getMessage();
//}

$servername = "DEV\SQLEXPRESS";
$db = "TEST";
$user = "sa";
$pwd = "DEV\SQLEXPRESS1";

$connection = 
[
   "Database" => $db,
   "Uid" => $user,
   "PWD" => $pwd
];

$conn = sqlsrv_connect($servername, $connection);
if(!$conn)
{
   die(print_r(sqlsrv_errors(),true));
}
