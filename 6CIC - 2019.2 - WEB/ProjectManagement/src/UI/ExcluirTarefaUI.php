<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>

    <body> 
        <div class="container">
            <center>
            <div class="col-md-5 border" style="margin-top:150px;">
                             
                    <p>Deseja confirmar a exclusão?</p>
                    
                    <div class="form-group">
                        <a href="../UI/DetalhesTarefaUI.php?proj=<?=$proj?>&cod=<?=$tar?>" class="btn btn-success">Não</a>
                        <a href="?acao=5&conf=t&proj=<?=$proj?>&tar=<?=$tar?>" class="btn btn-danger">Sim</a> 
                    </div>

            </div>
            </center>
        </div>
    </body>
    
</html>