<meta charset="utf-8">

<?php
require_once "../Model/Projetos.php";
require_once "../Model/Tarefas.php";
require_once "../DAO/ProjetosDAO.php";
require_once "../DAO/TarefasDAO.php";
session_start();

$tar = $_GET['cod'];
$tmpTarefa = TarefasDAO::consultarTarefa($tar);

if ($tmpTarefa->getStatus() == 0) {
    $status = "Incompleta";
} else {
    $status = "Finalizada";
}
?>
<html>
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>

        <div class="container" style="margin-top: 10px;">
            <div class="card">
                <div class="card-header">
                    NOME DO PROJETO
                </div>
                <div class="card-body">

                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5> <?= $tmpTarefa->getNome(); ?> - <?= ProjetosDAO::corrigirData($tmpTarefa->getData()); ?> </h5>                       
                        </div>
                        <div class="card-body">

                            <?= $tmpTarefa->getDescricao(); ?><br>
                            Status: <b><?= $status; ?></b>
                        </div>                               
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card" style="margin-top:15px;">
                                <div class="card-header bg-success text-white">
                                    Mensagem
                                </div>
                                <div class="card-body">
                                    FORM                            
                                </div>                               
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card" style="margin-top:15px;">
                                <div class="card-header bg-warning text-white">
                                    Arquivos
                                </div>
                                <div class="card-body">
                                    LISTA DE ARQUIVOS   
                                    
                                    <form>
                                        <div class="form-group">
                                            <input type="file" class="form-control-sm">
                                        </div>
                                            
                                    </form>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </body>

</html>
