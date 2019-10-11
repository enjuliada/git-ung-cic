<?php
require_once "../DAO/ProjetosDAO.php";
session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../assets/css/cores.css">
    </head>

    <body>

       <?php
       include "MenuTopoUI.php";
       
       ?>


        <div class="container">



            <div class="row" style="margin-top:10px;"> <!--1º linha-->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body" style="height:65px;padding-top:10px;">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" name="HTML_busca" placeholder="Pesquisar usuários" class="form-control" style="height:45px;width:425px;">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn bg-primary-light text-white">
                                            Buscar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body" style="height:65px;padding-top:10px;">
                            <button class="btn bg-primary-light" style="width:100%;height:45px;">
                                <i class="fa fa-plus-square fa-lg fa-fw text-white"></i>
                                <a href="FormCadastroProjetoUI.php" class="text-white">                                
                                    Criar Novo Projeto
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:10px;"> <!--2º linha-->                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary-shadow text-white" style="height:50px;">
                            <h5 class="card-title">Dados do Usuário</h5>
                        </div>
                        <div class="card-body">

                            <img src="img/user.png" class="float-left">
                            <h4><?= $_SESSION['nome']; ?></h4>
                            <?= $_SESSION['email']; ?><br>
                            <?= $_SESSION['telefone']; ?><br>

                            <div class="dropup float-right">

                                <a href="#" class="btn bg-primary-light text-white dropdown-toggle" style="height:45px;width:300px;"id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars fa-lg fa-fw text-white"></i>
                                    Opções
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" style="width:300px;">
                                    <a class="dropdown-item" href="#">Alterar Dados</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../Control/UsuariosControl.php?acao=3">Sair</a>                                    
                                </div>
                            </div> 


                        </div>                        
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:10px;"> <!--3º linha-->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary-shadow text-white" style="height:50px;">
                            <h5>
                                <a href="ListaProjetosUI.php" class="text-white">
                                    <i class="fa fa-file-text fa-lg fa-fw text-white"></i>
                                    Projetos
                                </a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="height:200px;line-height:120px;">
                            <font style="font-size:100pt;">
                            <?= ProjetosDAO::contarProjetos($_SESSION['email']); ?>
                            </font>
                        </div>                            
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary-shadow" style="height:50px;">
                            <h5>
                                <a href="" class="text-white">
                                    <i class="fa fa-list fa-lg fa-fw text-white"></i>
                                    Tarefas
                                </a>
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
                        <div class="card-header bg-primary-shadow" style="height:50px;">
                            <h5>
                                <a href="" class="text-white">
                                    <i class="fa fa-users fa-lg fa-fw text-white"></i>
                                    Contatos
                                </a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="height:200px;line-height:120px;">

                        </div>                            
                    </div>
                </div>
            </div>
        </div>        
    </body>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>