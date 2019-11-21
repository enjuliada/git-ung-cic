<meta charset="utf-8">

<?php
require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";
require_once "../Model/Projetos.php";
require_once "../DAO/ProjetosDAO.php";

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
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <style>

            #DivAdd{
                position: absolute;
                width:650px;
                height:280px;
                top:200px;
                left:50%;
                margin-left:-325px;
                border-width:2px;
                border-style:solid;
                border-color:#000000;
                background-color: #FFFFFF;                
                display: none;
            }

        </style>

    </head>
    <body>
         <?php
            include "NavTopoUI.php";
        ?>      

        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5> <?= $tmpProjeto->getNome(); ?>  

                                <a href="../Control/ProjetosControl.php?acao=3&proj=<?=$proj?>" class="text-white float-right">
                                    <i class="fa fa-times fa-lg"></i>
                                    Excluir Projeto
                                </a>

                            </h5>
                        </div>
                        <div class="card-body">
                            <?= $tmpProjeto->getDescricao(); ?>
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
                            <?= $concluido; ?>%
                            </font>                            
                        </div>
                    </div>
                    <div class="card" style="margin-top: 10px;">
                        <div class="card-header">
                            <h5 class="card-title">Equipe
                                <a href="#" class="float-right" onclick="document.getElementById('DivAdd').style.display = 'block';"> (Adicionar)</a>
                            </h5>
                        </div>
                        <div class="card-body text-center" style="min-height:220px;height:auto;">
                            <?php
                            for ($i = 0; $i < count($itens); $i++) {
                                ?>
                                <?= $itens[$i]->getNome(); ?><br>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="margin-top:10px;">

                    <?php
                    $progresso = ProjetosDAO::medirProjeto($inicio, $fim);

                    if ($progresso < 30) {
                        $cor = "#98FB98"; //verde
                    } else if ($progresso < 70) {
                        $cor = "#FFA500"; //laranja/amarelo
                    } else if ($progresso < 100) {
                        $cor = "#FF0000"; //vermelho
                    } else {
                        $cor = "#555555"; //preto
                        $progresso = 100;
                    }
                    ?>                    

                    <div style="padding:5px;max-width:100%;width:<?= $progresso; ?>%;height:60px;background-color:<?= $cor; ?>;" id="DivBarra">                        
                        <div style="width:500px;">
                            <h1 style="font-family:impact;color:#999999">
                                <?= ProjetosDAO::contarDias($fim); ?> dias restantes.
                            </h1>
                        </div>
                    </div>

                    <div class="float-left">
                        <?= ProjetosDAO::corrigirData($tmpProjeto->getInicio()); ?>
                    </div>
                    <div class="float-right">     
                        <?= ProjetosDAO::corrigirData($tmpProjeto->getFim()); ?>
                    </div>
                    <br><br>
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <div class="row">
                                <div class="col-md-11">
                                    Tarefas
                                </div>
                                <div class="col-md-1">
                                    <a class="text-white" href="FormCadastroTarefaUI.php?cod=<?= $tmpProjeto->getCodigo(); ?>">(+)</a>
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
                <div class="card-header bg-danger">
                    Adicionar Integrantes 
                    <a href="#" class="text-white float-right" onclick="document.getElementById('DivAdd').style.display = 'none';">
                        Fechar
                    </a>
                </div>
                <div class="card-body">
                    <h5>Entre com o E-mail do usuário.</h5>
                    <form action="../Control/UsuariosControl.php" method="POST">
                        <div class="form-group">
                            <input type="email" name="HTML_usuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="acao" value="4">
                            <input type="hidden" name="proj" value="<?= $proj; ?>">
                            <button type="submit" class="btn btn-primary float-right">Adicionar à equipe</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>



    </body>

</html>
