<?php

date_default_timezone_set('Brazil/East');

require_once "../Model/Usuarios.php";
require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Projetos.php";
require_once "../DAO/ProjetosDAO.php";

session_start();

$cod = $_GET['cod']; //identificar o Projeto
$tmpProjeto = ProjetosDAO::consultarProjeto($cod);

$itens = UsuariosDAO::listarIntegrantes($cod);
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
        <div class="container d-flex" style="justify-content:center;">
            <div class="col-md-8"style="margin-top:100px;">
                <center><p><h5>Informe os dados da Tarefa</h5></p></center>
                
                <form action="../Control/TarefasControl.php" method="post">
                
                    <div class="form-group">
                        <h5>Nome do Projeto: <?=$tmpProjeto->getNome();?></h5>
                    </div>
                    <div class="form-group">
                        <input type="text" name="HTML_nome" placeholder="Insira o nome da tarefa" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descrição da tarefa</label>
                        <textarea name="HTML_descricao" class="form-control"></textarea> 
                    </div>
                    <div class="form-group">
                        <select name="HTML_usuario" class="form-control">
                            <option>Selecione o responsável</option>
                            
                            <?php
                                for($i=0; $i<count($itens); $i++){
                            ?>
                            <option value="<?=$itens[$i]->getEmail();?>">
                                <?=$itens[$i]->getNome();?>
                            </option>
                            
                             <?php                           
                                }
                            ?>
                            
                            
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Data de Inicio</label>
                            <h4><?=ProjetosDAO::corrigirData(date('Y-m-d'));?></h4>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="codProj" value="<?=$cod?>">
                        <input type="hidden" name="acao" value="2">
                        <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>