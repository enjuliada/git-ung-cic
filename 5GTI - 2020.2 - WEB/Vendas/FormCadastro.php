
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
        include "Conexao.php";
        
        $sqlCat = "Select * from Categorias";
        $rsCat = mysqli_query($vc, $sqlCat) or die(mysqli_error($vc)); //execução do select guardando o resultado no RS
        
        include "Topo.php";
        ?>
        <hr>

        <div class="container border" id="DivCadastro">
            <form action="Cadastro.php" class="form" method="post">

                <div class="row BarraTopo">
                    <div class="col text-center">
                        Cadastro de Produtos
                    </div>
                </div>


                <div class="row LinhaForm">

                    <div class="col">
                        <label class="TextoForm">Nome do Produto:</label>
                        <input type="text" name="HTML_nome" class="form-control">
                    </div>    

                    <div class="col">
                        <label class="TextoForm">Categoria:</label>
                        <select name="HTML_categoria" class="form-control">
                            
                            <?php
                            while($tblCat = mysqli_fetch_array($rsCat)){
                            ?>
                            
                            <option value="<?=$tblCat['codigo']?>">
                                <?=$tblCat['nome'];?>
                            </option>
                            
                            <?php
                            }
                            ?>
                            
                        </select>
                    </div>
                </div>


                <div class="row LinhaForm">
                    <div class="col">
                        <label class="TextoForm">Marca:</label>
                        <input type="text" name="HTML_marca" class="form-control">
                    </div>

                    <div class="col">    
                        <label class="TextoForm">Valor:</label>
                        <input type="text" name="HTML_valor" class="form-control">
                    </div>
                </div>

                <div class="row" style="height:110px;">
                    <div class="col">
                        <label class="TextoForm">Descrição:</label>
                        <textarea name="HTML_descricao" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row LinhaForm">
                    <div class="col">
                        <label class="TextoForm">Imagem:</label>

                        <input type="text" name="HTML_imagem" class="form-control">

                    </div>
                </div>

                <div class="row LinhaForm">
                    <div class="col">
                        <button type="submit" class="btn float-right btn-info">Cadastrar Produto</button>
                    </div>
                </div>

            </form>    

        </div>

    </body>
</html>