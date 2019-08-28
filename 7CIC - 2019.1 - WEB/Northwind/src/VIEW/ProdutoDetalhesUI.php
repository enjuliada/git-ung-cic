
<div id="top" class="row">
    <div class="col-md-12">
        <h2>Informação sobre Produtos</h2>
    </div>

</div> <!-- /#top -->

<hr />

<div id="" class="row">
    <div class="table-responsive col-md-5">
        <center><img class="img-fluid" src="../../img/default.png"></center>
    </div>
    <div class="table-responsive col-md-7">

        <?php
        $codCat = $objProd->getCodCat();
        $objCat = $objBDCat->listarCategorias($conn, 1, $codCat);
        $nomeCat = $objCat[0]->getNome();

        $codForn = $objProd->getCodForn();
        $objForn = $objBDForn->listarFornecedores($conn, 1, $codForn);
        $nomeForn = $objForn[0]->getNome();

        $codProd = $objProd->getCod();
        ?>
        <table class="table table-striped table-dados" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <th>ID: <?= $objProd->getCod(); ?></th>
                </tr>
                <tr>
                    <th>Nome: <?= $objProd->getNome(); ?></th>
                </tr>
                <tr>
                    <th>Fornecedor: <a href="FornecedoresUI.php?type=1&id=<?= $codForn; ?>"><?= $nomeForn; ?></a></th>
                </tr>
                <tr>
                    <th>Categoria: <?= $nomeCat; ?></th>
                </tr>
                <tr>
                    <th>Formato: <?= $objProd->getQuant(); ?></th>
                </tr>
                <tr>
                    <th>Preço Unit.: <?= $objProd->getPreco(); ?></th>
                </tr>
                <tr>

                    <td class="actions">
                        <a class="btn btn-warning btn-sm" href="edit.html">Editar</a>
                        <a class="btn btn-danger btn-sm"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                    </td>

                </tr>


            </tbody>
        </table>
    </div>
</div>         