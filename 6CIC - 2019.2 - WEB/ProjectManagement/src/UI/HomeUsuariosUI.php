<?php
session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body>
        <div class="container">
            <div class="row" style="margin-top:10px;"> <!--1º linha-->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body" style="height:65px;padding-top:10px;">
                            <form class="form-inline">
                                <div class="input-group">
                                     <input type="text" name="HTML_busca" placeholder="Pesquisar usuários" class="form-control" style="height:45px;width:425px;">
                                     <div class="input-group-append">
                                        <button type="submit" class="btn btn-danger">Buscar</button>
                                     </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body" style="height:65px;padding-top:10px;">
                            <a href="FormCadastroProjetoUI.php" class="btn btn-primary" style="width:100%;">
                                + Criar Novo Projeto
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-top:10px;"> <!--2º linha-->                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="height:50px;">
                            <h5 class="card-title">Dados do Usuário</h5>
                        </div>
                        <div class="card-body">
                            
                            <img src="img/user.png" class="float-left">
                            <h4><?=$_SESSION['nome'];?></h4>
                            <?=$_SESSION['email'];?><br>
                            <?=$_SESSION['telefone'];?><br>
                            
                            <a href="" class="btn btn-danger float-right">
                                Alterar dados
                            </a>                            
                        </div>                        
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-top:10px;"> <!--3º linha-->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="height:50px;">
                            <h5>
                                <a href="">Projetos</a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="height:200px;line-height:120px;">
                            <font style="font-size:100pt;">
                                10
                            </font>
                        </div>                            
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="height:50px;">
                            <h5>
                                <a href="">Tarefas</a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="height:200px;line-height:120px;">
                            <font style="font-size:100pt;">
                                10
                            </font>
                        </div>                            
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="height:50px;">
                            <h5>
                                <a href="">Contatos</a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="height:200px;line-height:120px;">
                            
                        </div>                            
                    </div>
                </div>
            </div>
        </div>        
    </body>
    
</html>