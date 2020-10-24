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
        <!-- Conteudo da página -->
        <div class="container border">
            
            <div class="row"> <!-- 1ºLinha -->
                <div class="col-lg-12">
                    <img src="img/banner.jpg" class="img-thumbnail">
                </div>
            </div>
            
            <div class="row justify-content-md-center"> <!-- 2ºLinha -->
                <div class="col-lg-5 border" id="DivFormLogin">
                    
                        <form action="Login.php" method="post">
                        <h5>Preencha os dados abaixo para efetuar login</h5>                        
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input type="text" name="HTML_email" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Senha:</label>
                            <input type="password" name="HTML_senha" class="form-control">
                        </div>    
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark float-right">Acessar Sistema</button>
                        </div>
                    </form>   
                    
                </div>
            </div>
            
            <div class="row"> <!-- 3ºLinha -->
                <div class="col-lg-4 DivCards">
                    
                    <div class="card">
                        <img src="img/pessoas.jpg" class="card-img-top">
                        <div class="card-header bg-dark text-white">
                            PESSOAS
                        </div>
                        <div class="card-body">
                            <p>
                                Gerenciamento e classificação de clientes, funcionários e 
                                fornecedores.
                                
                            </p>
                           
                        </div>
                        <div class="card-footer">
                            Saiba mais(+)
                        </div>                        
                    </div>    
                </div>
                
                <div class="col-lg-4 DivCards">
                    <div class="card">
                        <img src="img/produtos.jpg" class="card-img-top">
                        <div class="card-header bg-dark text-white">
                            PRODUTOS
                        </div>
                        <div class="card-body">
                            <p>
                                Manipulação de estoque, fornecedores e gerenciamento
                                de dados de produtos.
                            </p>
                        </div>
                        <div class="card-footer">
                            Saiba mais(+)
                        </div>                        
                    </div>
                </div>
                
                <div class="col-lg-4 DivCards">
                    <div class="card">
                        <img src="img/vendas.jpg" class="card-img-top">
                        <div class="card-header bg-dark text-white">
                            VENDAS
                        </div>
                        <div class="card-body">
                            <p>
                                Registro de vendas, itens de produtos e 
                                armazenamento de valores em caixa.
                            </p>
                        </div>
                        <div class="card-footer">
                            Saiba mais(+)
                        </div>                        
                    </div>
                </div>                
            </div>            
            
            
        </div>
    </body>    
    
</html>