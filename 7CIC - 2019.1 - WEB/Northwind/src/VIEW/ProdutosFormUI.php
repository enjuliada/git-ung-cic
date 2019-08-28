<?php
if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];

    $objProd = new Produtos();


    if ($acao == 2) { //alterar
        $codProd = $_GET['id'];

        $objProd->setCod($codProd);

        $nome = $_GET['HTML_nome'];
        $quant = $_GET['HTML_quant'];
        $preco = $_GET['HTML_preco'];
        $codCat = $_GET['HTML_cat'];
        $codForn = $_GET['HTML_forn'];

        $objProd->setNome($nome);
        $objProd->setQuant($quant);
        $objProd->setPreco($preco);
        $objProd->setCodCat($codCat);
        $objProd->setCodForn($codForn);


        //****CHAMADA DO METODO DE ALTERAR
        $objBDProd->alterarProduto($conn, $objProd, $codProd);
       
        
        echo "<script>alert('Produto $nome alterado');</script>";
        echo "<script>location.href='ProdutosUI.php?type=0';</script>";
    
        
        
    } else if ($acao == 1) { //cadastrar
        $nome = $_GET['HTML_nome'];
        $quant = $_GET['HTML_quant'];
        $preco = $_GET['HTML_preco'];
        $codCat = $_GET['HTML_cat'];
        $codForn = $_GET['HTML_forn'];

        $objProd->setNome($nome);
        $objProd->setQuant($quant);
        $objProd->setPreco($preco);
        $objProd->setCodCat($codCat);
        $objProd->setCodForn($codForn);


        $objBDProd->cadastrarProduto($conn, $objProd);

        echo "<script>alert('Produto $nome cadastrado');</script>";
        echo "<script>location.href='ProdutosUI.php?type=0';</script>";
    } else if ($acao == 3) {//desativar
        $codProd = $_GET['id'];


        $objProd->setPreco(-1);

        $nome = $objProd->getNome();
        $objBDProd->alterarProduto($conn, $objProd, $codProd);

        echo "<script>alert('Produto $nome fora de linha');</script>";
        echo "<script>location.href='ProdutosUI.php?type=0';</script>";
    }
} else {

    $dados = $_GET['dados'];

    $itensCat = $objBDCat->listarCategorias($conn, 0, 0);
    $itensForn = $objBDForn->listarFornecedores($conn, 0, 0);
    ?>
    <div id="top" class="row">
        <div class="col-md-12">
            <h2>Produtos</h2>
        </div>

    </div> <!-- /#top -->

    <hr />

    <?php
    if ($dados == 0) {//formulario vazio 
        ?>

        <form action="ProdutosUI.php" method="GET">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" class="form-control" id="HTML_nome" name="HTML_nome">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Formato</label>
                    <input type="text" class="form-control" id="HTML_quant" name="HTML_quant">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Preço Unitário</label>
                    <input type="text" class="form-control" id="HTML_preco" name="HTML_preco">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Categoria</label>
                    <select class="form-control" id="HTML_cat" name="HTML_cat">
        <?php for ($i = 0; $i < count($itensCat); $i++) { ?>
                            <option value="<?= $itensCat[$i]->getCod(); ?>">
                            <?= $itensCat[$i]->getNome(); ?>
                            </option>

            <?php
        }
        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Fornecedor</label>
                    <select class="form-control" id="HTML_forn" name="HTML_forn">
        <?php for ($i = 0; $i < count($itensForn); $i++) { ?>
                            <option value="<?= $itensForn[$i]->getCod(); ?>">
                            <?= $itensForn[$i]->getNome(); ?>
                            </option>

            <?php
        }
        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12" style="text-align:right;">
                    <input type="hidden" name="acao" value="1">
                    <input type="hidden" name="type" value="3">
                    <input type="submit" class="btn btn-primary" value="Cadastrar Item">
                </div>
            </div>
        </form>

        <?php
    } else if ($dados == 1) {
        $id = $_GET['id'];
        $objProd = $objBDProd->detalhesProduto($conn, $id);
        ?>

        <form action="ProdutosUI.php" method="GET">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" class="form-control" id="HTML_nome" name="HTML_nome" value="<?= $objProd->getNome(); ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Formato</label>
                    <input type="text" class="form-control" id="HTML_quant" name="HTML_quant" value="<?= $objProd->getQuant(); ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Preço Unitário</label>
                    <input type="text" class="form-control" id="HTML_preco" name="HTML_preco" value="<?= $objProd->getPreco(); ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Categoria</label>
                    <select class="form-control" id="HTML_cat" name="HTML_cat">
        <?php
        $codCat = $objProd->getCodCat();
        $objCat = $objBDCat->listarCategorias($conn, 1, $codCat);
        $nomeCat = $objCat[0]->getNome();
        ?>

                        <option value="<?= $codCat; ?>"><?= $nomeCat; ?></option>
                        <?php for ($i = 0; $i < count($itensCat); $i++) { ?>
                            <option value="<?= $itensCat[$i]->getCod(); ?>">
                            <?= $itensCat[$i]->getNome(); ?>
                            </option>

                                <?php
                            }
                            ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Fornecedor</label>
                    <select class="form-control" id="HTML_forn" name="HTML_forn">
        <?php
        $codForn = $objProd->getCodForn();
        $objForn = $objBDForn->listarFornecedores($conn, 1, $codForn);
        $nomeForn = $objForn[0]->getNome();
        ?>

                        <option value="<?= $codForn; ?>"><?= $nomeForn; ?></option>

        <?php for ($i = 0; $i < count($itensForn); $i++) { ?>
                            <option value="<?= $itensForn[$i]->getCod(); ?>">
                            <?= $itensForn[$i]->getNome(); ?>
                            </option>

                                <?php
                            }
                            ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12" style="text-align:right;">
                    <input type="hidden" name="acao" value="2">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="type" value="3">
                    <input type="submit" class="btn btn-primary" value="Alterar Item">
                </div>
            </div>
        </form>


        <?php
    }
}
?>