<?php
$id = $_GET['idReg']; //objeto GET acessa o valor de uma variavel passada via URL

$rsProduto = consultarPorProduto($vConn, $id); //chamando metodo que retorna dados do Produto selecionado
$rsFornecedor = listarFornecedoresProduto($vConn, $id); //chamando metodo que retorna dados do Produto selecionado

$tblProduto = mysqli_fetch_array($rsProduto); //abrindo o resultset para exibição dos dados
?>
 <img src="img/bproducts.jpg" class="img-fluid" style="margin-top:15px;">
<hr>

<div class="row">
    <div class="col-lg-2">
        <img src="img/product.jpg" class="img-thumbnail">
    </div>

    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= $tblProduto['ProductName'] ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                Categoria: <?= $tblProduto['CategoryID'] ?><br>
                Quantidade por Unidade: <?= $tblProduto['QuantityPerUnit'] ?><br>
            </div>

            <div class="col-lg-6">
                Preço da Unidade: <?= $tblProduto['UnitPrice'] ?><br>
                Unid. em Estoque: <?= $tblProduto['UnitsInStock'] ?><br>
                Unid. Encomendadas: <?= $tblProduto['UnitsOnOrder'] ?><br>

            </div>
        </div>
    </div>
</div>

        <hr>
        <center>
            <u><h5 style="margin-top:15px;">Dados do Fornecedor</h5></u>
        </center>
        <hr>
        
        <table class="table table-sm table-striped">
            <thead>
                    <th class="TopoTabela">Código</th>
                    <th class="TopoTabela">Nome</th>
                    <th class="TopoTabela">Representante</th>
                    <th class="TopoTabela">Cargo</th>
                    <th class="TopoTabela">Telefone</th>
                    <th class="TopoTabela">Fax</th>
            </thead>
            <tbody>                
                <?php
                while ($tblFornecedor = mysqli_fetch_array($rsFornecedor)) {
                    ?>
                    <tr>
                        <td class="TextoDados"><?= $tblFornecedor['SupplierID'] ?></td>            
                        <td class="TextoDados"><?= $tblFornecedor['CompanyName'] ?></td>
                        <td class="TextoDados"><?= $tblFornecedor['ContactName'] ?></td>
                        <td class="TextoDados"><?= $tblFornecedor['ContactTitle'] ?></td>
                        <td class="TextoDados"><?= $tblFornecedor['Phone'] ?></td>
                        <td class="TextoDados"><?= $tblFornecedor['Fax'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
