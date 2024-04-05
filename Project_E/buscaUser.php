<?php 

$sql = "SELECT * FROM USUARIOS WHERE NOME_USER = '" . $_SESSION['username'] . "' AND SENHA = '" . $_SESSION['pass'] . "'";

$busca_user = sqlsrv_fetch_array( sqlsrv_query( $conn, $sql), SQLSRV_FETCH_ASSOC);
