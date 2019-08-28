 <br>
 
<form action="ProdutosUI.php" method="GET">
<div id="top" class="form-row">
    <div class="col-md-4">
        <h2>Produtos</h2>
    </div>
    <div class="form-group col-md-4">           
        <input type="text" name="HTML_busca" class="form-control" placeholder="Buscar Produtos">             
    </div>
    <div class="form-group col-md-3">            
        <input type="hidden" name="type" value="1">
        <input type="submit" value="Buscar" class="btn btn-primary">             
    </div>
        
    <div class="col-md-1">
        <a href="ProdutosUI.php?type=3&dados=0">Adicionar</a>
    </div>

</div> <!-- /#top -->

</form>

<hr />

<div id="list" class="row">

    <div class="table-responsive col-md-12">
        <table class="table table-striped table-dados" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Fornecedor</th>
                    <th>Categoria</th>
                    <th>Formato</th>
                    <th>Preço Unit.</th>
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                for ($i = 0; $i < count($itens); $i++) {

                    $codCat = $itens[$i]->getCodCat();
                    $objCat = $objBDCat->listarCategorias($conn, 1, $codCat);
                    $nomeCat = $objCat[0]->getNome();

                    $codForn = $itens[$i]->getCodForn();
                    $objForn = $objBDForn->listarFornecedores($conn, 1, $codForn);
                    $nomeForn = $objForn[0]->getNome();

                    $codProd = $itens[$i]->getCod();                    
                    $precoBD = $itens[$i]->getPreco();
                    
                    if($precoBD < 0){
                        $preco = "-";
                        $cor = "#FF0000";
                    }else{
                        $preco = number_format($itens[$i]->getPreco(), 2);
                        $cor = "#1E90FF";
                    }
                    
                    ?>
                    <tr>
                        <td><font class="FntData"><?= $codProd; ?></font></td>
                        <td><a href="ProdutosUI.php?type=2&id=<?= $codProd; ?>"><font color="<?=$cor;?>"><?= $itens[$i]->getNome(); ?></font></a></td>
                        <td><font class="FntData"><a href="FornecedoresUI.php?type=1&id=<?= $codForn; ?>"><?= $nomeForn; ?></a></font></td>
                        <td><font class="FntData"><?= $nomeCat; ?></font></td>
                        <td><font class="FntData"><?= $itens[$i]->getQuant(); ?></font></td>
                        <td><font class="FntData"><?=$preco;?></font></td>

                        <td class="actions">
                            <a class="btn btn-warning btn-sm" href="ProdutosUI.php?type=3&dados=1&id=<?=$codProd;?>">Editar</a>
                            <a class="btn btn-danger btn-sm"  href="ProdutosUI.php?type=4&id=<?=$codProd;?>">Excluir</a>
                        </td>

                    </tr>
                    <?php
                }
                ?>

            </tbody>

        </table>

    </div>
</div>
