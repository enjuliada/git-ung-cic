<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>

        <div class="container d-flex" style="justify-content:center;">

            <div class="col-md-8"style="margin-top:100px;">
                <center><p><h5>Informe os dados do Projeto</h5></p></center>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" name="HTML_nome" placeholder="Insira o nome do Projeto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descrição do Projeto</label>
                        <textarea name="HTML_descricao "class="form-control"></textarea> 
                    </div>
                    <div class="form-group">
                        <select name="HTML_categoria" class="form-control">
                            <option>Selecione uma categoria</option>

                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Data de Inicio</label>
                            <input type="date" name="HTML_inicio" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Previsão de Fim</label>
                            <input type="date" name="HTML_fim" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
                    </div>
                </form>

            </div>
        </div>

    </body>

</html>