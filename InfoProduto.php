<?php
$id = $_GET['idReg']; //objeto GET acessa o valor de uma variavel passada via URL

$rsProduto = consultarPorProduto($vConn, $id); //chamando metodo que retorna dados do Produto selecionado
$rsFornecedor = listarFornecedoresProduto($vConn, $id); //chamando metodo que retorna dados do Produto selecionado

$tblProduto = mysqli_fetch_array($rsProduto); //abrindo o resultset para exibição dos dados
?>

<div class="row">
    <div class="col-lg-2">
        <img src="img/user.jpg" class="img-thumbnail">
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
        
        <table class="table table-sm table-striped">
            <thead>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Representante</th>
                    <th>Cargo</th>
                    <th>Telefone</th>
                    <th>Fax</th>
            </thead>
            <tbody>                
                <?php
                while ($tblFornecedor = mysqli_fetch_array($rsFornecedor)) {
                    ?>
                    <tr>
                        <td><?= $tblFornecedor['SupplierID'] ?></td>            
                        <td><?= $tblFornecedor['CompanyName'] ?></td>
                        <td><?= $tblFornecedor['ContactName'] ?></td>
                        <td><?= $tblFornecedor['ContactTitle'] ?></td>
                        <td><?= $tblFornecedor['Phone'] ?></td>
                        <td><?= $tblFornecedor['Fax'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
