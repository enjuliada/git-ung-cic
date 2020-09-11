<html>

    <head>
        <!-- Cabeçalho: configuração da página -->
        <meta charset="utf-8"> <!--codificação de caracteres-->
        <title>Sistemas Web - 6CIC</title> <!-- String aba do nav -->

        <!-- Referencia ao Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Referencia ao FontAwesome -->    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link rel="stylesheet" href="css/estilo.css">

    </head>

    <body>
        <div class="container">

            <?php 
            if(!isset($_GET['idPg'])){ //se a variavel URL idPg nao existir (monta a home)                
            ?>
            
            <div class="row"> <!--1º LINHA (row) -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-top">
                            <a href="Painel.php?idPg=10">
                                Clientes
                            </a>                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-top">
                            <a href="Painel.php?idPg=20">
                                Funcionários
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-top">
                            <a href="Painel.php?idPg=30">
                                Fornecedores
                            </a>
                        </div>
                    </div>
                </div>

            </div>            
            
            <div class="row"> <!--2º LINHA (row) -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-top">
                            <a href="Painel.php?idPg=40">
                                Transportadoras
                            </a>                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-top">
                            <a href="Painel.php?idPg=50">
                                Estoque
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-top">
                            <a href="Painel.php?idPg=60">
                                Vendas
                            </a>
                        </div>
                    </div>
                </div>

            </div>            
            <?php
            }else{ //se a variavel idPg existir
                $idPg = $_GET['idPg'];
                
                if($idPg == 10){
                    //Clientes
                    $tabela = "customers";
                }else if($idPg == 20){
                    //Funcionários
                    $tabela = "employees";
                }else if($idPg == 30){
                    //Fornecedores
                    $tabela = "suppliers";
                }else if($idPg == 40){
                    //Transportadoras
                    $tabela = "shippers";
                }else if($idPg == 50){
                    //Estoque
                    $tabela = "products";
                }else if($idPg == 60){
                    //Vendas
                    $tabela = "orders";
                }
                
                include "FuncoesDAO.php";
                include "Modulos.php";
                
            }//fechando else (!isset)
            ?>
        
        </div>
    
    </body>

</html>