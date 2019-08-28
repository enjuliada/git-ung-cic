<?php
//require_once"Produtos.php";
require_once "..\DAO\ConexaoDAO.php";
require_once "..\DAO\ProdutosDAO.php";
require_once "..\MODEL\Produtos.php";
require_once "..\DAO\CategoriasDAO.php";
require_once "..\MODEL\Categorias.php";
require_once "..\DAO\FornecedoresDAO.php";
require_once "..\MODEL\Fornecedores.php";
?>    

<meta charset="utf-8">

<html>

    <head>
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
        <script src="../../js/bootstrap.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
        <link rel="stylesheet" href="../../css/bootstrap.css">    
        <link rel="stylesheet" href="../../css/estilo.css">    
    </head>

    <body>
        <div id="main" class="container-fluid">
            <?php
            include "MenuUI.php";
            ?>

            <?php
            $objBD = new ConexaoDAO();
            $conn = $objBD->abrirConexao();

            $objBDProd = new ProdutosDAO();


            $objBDCat = new CategoriasDAO();
            $objBDForn = new FornecedoresDAO();


            if (!isset($_GET['type'])) {
                $type = 0;
            } else {
                $type = $_GET['type'];
            }
            if ($type == 0) {//listar todos
                $itens = $objBDProd->listarProdutos($conn, $type,"");
                include "ProdutosListaUI.php";
            
            } else if ($type == 1) {//listar por nome
                $nome = $_GET['HTML_busca'];
                $itens = $objBDProd->listarProdutos($conn, $type, $nome);
                include "ProdutosListaUI.php";
            } else if ($type == 2){//detalhes do produto
                $id = $_GET['id'];
                $objProd = new Produtos();
                $objProd = $objBDProd->detalhesProduto($conn, $id); //exibir detalhe por cod
            
                include "ProdutoDetalhesUI.php";
                
            }else if($type == 3){                
                include "ProdutosFormUI.php";
            } else if($type == 4){
                
                $id = $_GET['id'];
                include "ProdutosConfUI.php";
                
                
            }
            
            
            ?>
        </div>
    </body>
</html>