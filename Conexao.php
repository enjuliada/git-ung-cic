<?php
/*Arquivo de conexão com a base de dados mysql
 * que deverá ser incluído em todas as páginas que possuirem
 * acesso ao banco de dados*/

$servidorBD = "localhost";
$usuarioBD = "root";
$senhaBD = "";
$nomeBD = "northwind";

$vConn = mysqli_connect($servidorBD, $usuarioBD, $senhaBD, $nomeBD);
mysqli_set_charset($vConn, "utf8");


?>