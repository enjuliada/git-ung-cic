<meta charset="utf-8">

<?php

require_once "../Model/Projetos.php";
require_once "../DAO/ProjetosDAO.php";
require_once "../Model/Usuarios.php";
require_once "../DAO/UsuariosDAO.php";

session_start();

$proj = $_GET['cod'];
$tmpProjeto = ProjetosDAO::consultarProjeto($proj);

$itens = UsuariosDAO::listarIntegrantes($proj);

$inicio = $tmpProjeto->getInicio();
$fim = $tmpProjeto->getFim();

?>
<html>
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <style>
            #DivAdd{
                position:absolute;
                top:220px;
                height:240px;
                width:650px;
                left:50%;
                margin-left:-325px;
                background-color:#FFFFFF;
                border-color:#CCCCCC;
                border-width:2px;
                border-style:solid;
                display:none;                
            }
            
        </style>  

    </head>
    <body>

        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5> <?=$tmpProjeto->getNome();?> </h5>                       
                        </div>
                        <div class="card-body">
                            <?=$tmpProjeto->getDescricao();?>
                        </div>                               
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="margin-top:10px;">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Concluído</h5>
                        </div>
                        <div class="card-body text-center" style="height:120px;line-height:80px;">
                            
                            <?php
                            $concluido = ProjetosDAO::calcularProgresso($proj);
                            ?>
                            
                            <font style="font-family:impact;font-size:100px;">
                            <?=$concluido;?>%
                            </font>                            
                        </div>
                    </div>
                    <div class="card" style="margin-top: 10px;">
                        <div class="card-header">
                            <h5 class="card-title">Equipe
                                <a href="#" onclick="document.getElementById('DivAdd').style.display='block';"> (Adicionar)</a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="min-height:220px;height:auto;">
                            <?php
                            for($i=0; $i<count($itens); $i++){
                            ?>
                                <?=$itens[$i]->getNome();?><br>
                            <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="margin-top:10px;">
                    
                    <?php
                    $progresso=ProjetosDAO::medirProjeto($inicio, $fim);
                    
                    if($progresso < 30){
                        $cor = "#98FB98"; //verde
                    }else if($progresso < 70){
                        $cor = "#FFA500"; //laranja/amarelo
                    }else if($progresso < 100){
                        $cor = "#FF0000"; //vermelho
                    }else{
                        $cor = "#555555"; //preto
                        $progresso = 100;
                    }
                    ?>                    
                    
                    <div style="padding:5px;max-width:100%;width:<?=$progresso;?>%;height:60px;background-color:<?=$cor;?>;" id="DivBarra">                        
                        <div style="width:500px;">
                            <h1 style="font-family:impact;color:#999999">
                                <?=ProjetosDAO::contarDias($fim);?> dias restantes.
                            </h1>
                        </div>
                    </div>
                    
                    <div class="float-left">
                        <?=ProjetosDAO::corrigirData($tmpProjeto->getInicio());?>
                    </div>
                    <div class="float-right">     
                        <?=ProjetosDAO::corrigirData($tmpProjeto->getFim());?>
                    </div>
                    <br><br>
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <div class="row">
                                <div class="col-md-11">
                                    Tarefas
                                </div>
                                <div class="col-md-1">
                                    <a class="text-white" href="FormCadastroTarefaUI.php?cod=<?=$tmpProjeto->getCodigo();?>">(+)</a>
                                </div>
                            </div>
                            
                             </div>
                            <div class="card-body" style="min-height:318px;height:auto;">
                            <?php
                                include "ListaTarefasUI.php";
                            ?>
                            </div> 
                </div>
            </div>

        </div>

        </div>
       
        
        <div id="DivAdd">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Adicionar Integrante
                    <a href="#" onclick="document.getElementById('DivAdd').style.display='none';" class="text-white float-right">[Fechar]</a>
                </div>
                <div class="card-body">
                    <h5>Entre com o e-mail do usuário que deseja adicionar</h5>
                    <form action="../Control/UsuariosControl.php" method="post">
                        <div class="form-group">
                            <input type="email" name="HTML_usuario" class="form-control">
                        </div> 
                        <div class="form-group">
                            <input type="hidden" name="acao" value="4">
                            <input type="hidden" name="proj" value="<?=$proj;?>">
                            <button type="submit" class="btn btn-primary float-right">Adicionar</button>
                        </div>
                        
                    </form>                    
                </div>
            </div>
        </div>
        
    </body>

</html>
