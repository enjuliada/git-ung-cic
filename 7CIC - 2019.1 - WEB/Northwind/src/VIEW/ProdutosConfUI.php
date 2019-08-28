<?php

require_once "../DAO/ConexaoDAO.php";
require_once "../DAO/ProdutosDAO.php";

$objBD = new ConexaoDAO();
$conn = $objBD->abrirConexao();

$objBDProd = new ProdutosDAO();

if(isset($_GET['acao'])){
    $id = $_GET['id'];
    $objBDProd->excluirProduto($conn, $id);
    echo "<script>alert('Produto excluido');</script>";
    echo "<script>location.href='ProdutosUI.php';</script>";
}

$objProd = $objBDProd->detalhesProduto($conn, $id);
?>

Deseja realmente excluir <?=$objProd->getNome();?>

<a href="ProdutosConfUI.php?id=<?=$id?>&acao=1">Sim</a>
<a href="ProdutosUI.php">Não</a>

