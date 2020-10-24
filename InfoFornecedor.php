<?php
$id = $_GET['idReg']; //objeto GET acessa o valor de uma variavel passada via URL

$rsFornecedor = consultarPorFornecedor($vConn, $id); //chamando metodo que retorna dados do Fornecedor selecionado
$rsProduto = listarProdutosFornecedor($vConn, $id); //chamando metodo que retorna dados do Fornecedor selecionado

$tblFornecedor = mysqli_fetch_array($rsFornecedor); //abrindo o resultset para exibição dos dados
?>

<div class="row">
    <div class="col-lg-2">
        <img src="img/user.jpg" class="img-thumbnail">
    </div>

    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= $tblFornecedor['CompanyName'] ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                Representante: <?= $tblFornecedor['ContactName'] ?><br>
                Cargo: <?= $tblFornecedor['ContactTitle'] ?><br>
                Telefone: <?= $tblFornecedor['Phone'] ?><br>
                Fax: <?= $tblFornecedor['Fax'] ?><br>
            </div>

            <div class="col-lg-6">
                Endereço: <?= $tblFornecedor['Address'] ?><br>
                Cidade: <?= $tblFornecedor['City'] ?><br>
                País: <?= $tblFornecedor['Country'] ?><br>

            </div>
        </div>
    </div>
</div>

        <hr>
        
        <table class="table table-sm table-striped">
            <thead>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Quant. por Unidade</th>
                    <th>Unid. em Estoque</th>
                    <th>Unid. Encomendadas</th>
                    <th>Preço da Unidade</th>
                    
            </thead>
            <tbody>                
                <?php
                while ($tblProduto = mysqli_fetch_array($rsProduto)) {
                    ?>
                    <tr>
                        <td><?= $tblProduto['ProductID'] ?></td>            
                        <td><?= $tblProduto['ProductName'] ?></td>
                        <td><?= $tblProduto['CategoryID'] ?></td>
                        <td><?= $tblProduto['QuantityPerUnit'] ?></td>
                        <td><?= $tblProduto['UnitsInStock'] ?></td>
                        <td><?= $tblProduto['UnitsOnOrder'] ?></td>
                        <td>U$ <?= number_format($tblProduto['UnitPrice'], 2) ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
