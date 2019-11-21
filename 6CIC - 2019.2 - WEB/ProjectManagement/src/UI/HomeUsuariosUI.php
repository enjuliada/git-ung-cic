<?php
require_once "../DAO/ProjetosDAO.php";
session_start();

$email=$_SESSION['email'];

if(!isset($_SESSION['statusLogin']) || $_SESSION['statusLogin'] != 1){
    echo "<script>location.href='../../index.php'</script>";
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body>        
        <?php
            include "NavTopoUI.php";
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
                            <a href="FormCadastroProjetoUI.php" class="btn btn-primary" style="width:100%;height: 45px;">
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
                            
                          <div class="dropup float-right">
                                <a href="#" class="btn btn-danger dropdown-toggle" style="height:45px;width:300px;"id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opções
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" style="width:300px;">
                                     <a class="dropdown-item" href="FormAlteraUsuarioUI.php?user=<?=$email?>">Alterar Dados</a>
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
                        <div class="card-header" style="height:50px;">
                            <h5>
                                <a href="ListaProjetosUI.php">Projetos</a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="height:200px;line-height:120px;">
                            <font style="font-size:100pt;">
                                <?=ProjetosDAO::contarProjetos($_SESSION['email']);?>
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
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</html>