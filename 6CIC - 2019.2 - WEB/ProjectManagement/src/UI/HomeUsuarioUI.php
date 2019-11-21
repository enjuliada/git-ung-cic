<?php
session_start();
require_once "../DAO/ProjetosDAO.php";
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body>
        <div class="container">
            
            <div class="row" style="margin-top:10px;"> <!--1 linha-->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body" style="height:65px;padding-top:10px;">
                            <form class="form-inline">
                                <div class="input-group">
                                        <input type="text" name="HTML_busca" class="form-control" placeholder="Buscar usuários" style="width:425px;height:45px;">
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
                            <a href="FormCadastroProjetoUI.php" class="btn btn-primary" style="width:100%;height:45px;">
                                + Criar novo projeto
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row" style="margin-top:10px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="height:50px;">
                            <h5 class="card-title">Dados do Usuário</h5>                            
                        </div>
                        <div class="card-body">
                            <img src="../../img/user.png" class="float-left">
                            <h4><?=$_SESSION['nome'];?></h4>
                            <?=$_SESSION['telefone'];?><br>
                            <?=$_SESSION['email'];?><br>
                            
                            <a href="#" class="btn btn-danger float-right" style="height:40px;width:320px;">
                                Alterar Dados
                            </a>
                                
                            
                            
                        </div>                        
                    </div>                    
                </div>                
            </div>
            
            <div class="row" style="margin-top:10px;">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="height:50px;">
                            <h5 class="card-title">
                                <a href="ListaProjetosUI.php">Projetos</a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="height:170px;line-height:120px;">
                            <font style="font-size:100pt;"><?=ProjetosDAO::contarProjetos($_SESSION['email']);?></font>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="height:50px;">
                            <h5 class="card-title">
                            <a href="">Tarefas</a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="height:170px;line-height:120px;">
                            <font style="font-size:100pt;">10</font>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="height:50px;">
                            <h5 class="card-title">
                                <a href="">Equipes</a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="height:170px;line-height:120px;">
                            
                        </div>
                    </div>
                </div>
                
            </div>
        
        </div> <!--container-->
    </body>
</html>