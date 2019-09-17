<meta charset="utf-8">

<?php
session_start();
?>
<html>
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>

        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            NOME DO PROJETO 
                        </div>
                        <div class="card-body">
                            descricao
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
                            <font style="font-family:impact;font-size:100px;">
                            0%
                            </font>                            
                        </div>
                    </div>
                    <div class="card" style="margin-top: 10px;">
                        <div class="card-header">
                            <h5 class="card-title">Equipe</h5>
                        </div>
                        <div class="card-body text-center" style="min-height:220px;height:auto;">
                            (integrantes)
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="margin-top:10px;">
                    <div style="width:30%;height:60px;background-color:lightgreen;" >

                    </div>
                    <div class="float-left">
                        (Dt. Inicial)
                    </div>
                    <div class="float-right">     
                        (Dt. Final)
                    </div>
                    <br><br>
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            Tarefas
                        </div>
                        <div class="card-body" style="min-height:318px;height:auto;">
                            descricao
                        </div>  

                    </div>
                </div>
            </div>

        </div>

    </body>

    ?>

</html>

