<?php

session_start();

include "Conexao.php";
include "FuncoesDAO.php";

$idPed = $_POST['idPed'];
$idCli = $_POST['idCli'];
$idFunc = $_POST['HTML_funcionario'];
$dataPed = $_POST['dataPed'];
$dataPag = $_POST['HTML_dataPag']; 
$dataEnvio = $_POST['HTML_dataEnvio']; 
$idTrans = $_POST['HTML_transportadora'];
$frete = $_POST['HTML_frete'];

$sqlVenda = "Insert into orders(customerid, employeeId, orderdate, requireddate, shippeddate, shipvia, freight) values (";
$sqlVenda.= "'$idCli',$idFunc,'$dataPed','$dataPag', '$dataEnvio', $idTrans, $frete)";

mysqli_query($vConn, $sqlVenda) or die(mysqli_error($vConn)); //insert na tab orders


//multiplos inserts na tabela orderDetails (itens)
registrarItens($vConn, $_SESSION['itens'], $idPed);

$_SESSION['itens']="";

echo "<script>alert('Venda Efetuada!');</script>";
echo "<script>location.href='Painel.php?idPg=11&idReg=$idCli';</script>";//redirecionando

?>
