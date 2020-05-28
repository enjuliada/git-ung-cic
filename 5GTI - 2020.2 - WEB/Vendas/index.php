
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css" type="text/css">

    </head>

    <body>

        <?php
        include "Topo.php";
        ?>
        <hr>
        <div class="container-fluid">
            <div class="row">

                <?php
                include "Conexao.php";

                if (!isset($_GET['busca']) || $_GET['busca'] == 0) {
                    $sqlprodutos = "Select * from produtos"; //criando o SQL Select
                } else {
                    $jogo = $_GET['HTML_jogo']; //jogar o conteudo da caixa de texto na variavel jogo
                    $sqlprodutos = "Select * from produtos where nome like '%$jogo%'";
                }

//Executando o select e guardando resultado na variavel rsprodutos
                $rsprodutos = mysqli_query($vc, $sqlprodutos)or die(mysqli_error($vc));

                if (mysqli_num_rows($rsprodutos) == 0) {
                    echo "Não há produtos cadastrados";
                } else {
                    //listar e exibir os produtos
                    //guardando o total de produtos exibidos
                    $totProd = mysqli_num_rows($rsprodutos);

                    while ($tblprodutos = mysqli_fetch_array($rsprodutos)) {
                        ?>

                        <div class="col-lg-3">
                            <div class="card">
                                <img src="img/<?= $tblprodutos['imagem']; ?>" class="card-img-top">
                                <div class="card-body">
                                    <font class="TituloProduto"><?= $tblprodutos['nome']; ?></font>
                                </div>
                            </div>
                        </div>

                        <?php
                    }//fechando while
                }//fechando if
                ?>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    Foram encontrados <b><?= $totProd; ?></b> produtos.
                </div>
            </div>

        </div>

        <div class="modal fade" id="FormLogin" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="" action="Login.php" method="POST">

                            <div class="card">
                                <div class="card-header BarraTopo text-center">
                                    <h5 class="card-title text-white TituloLogo">                                        
                                        Área Administrativa
                                    </h5>
                                </div>
                                <div class="card-body text-center">
                                    Informe abaixo os dados de login.
                                    <br><br>
                                    
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="HTML_LOGIN" placeholder="Nome de Usuário">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="HTML_SENHA" placeholder="Senha">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn float-right Botao2">Acessar área</button>
                                    </div>


                                </div>
                            </div>

                        </form>
                    </div>
                </div>                
            </div> 
        </div>       
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
