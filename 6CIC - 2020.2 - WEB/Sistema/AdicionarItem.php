<?php
session_start();

$idCli = $_GET['idCli'];
$codProd = $_GET['HTML_produto'];
$qtde = $_GET['HTML_qtde'];

$_SESSION['itens'].=$codProd."-".$qtde."#";

echo "<script>location.href='Painel.php?idPg=62&idCli=$idCli';</script>";

?>