
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>

    <body>   

        <div class="container">
            <center>
            <div class="col-md-5 border" style="margin-top:150px;">
                <form action="src/Control/UsuariosControl.php" method="post">
                    <p>Preencha os campos abaixo</p>

                    <div class="form-group">
                        <input type="text" name="HTML_email" placeholder="Digite seu e-mail" class="form-control">
                    </div>

                    <div class="form-group">                    
                        <input type="password" name="HTML_senha" placeholder="Entre com a senha" class="form-control">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-outline-primary"><a href="src/UI/FormCadastroUsuarioUI.php">Cadastre-se </a></button>
                        <input type = "hidden" name="acao" value="1">
                        <button type="submit" class="btn btn-primary">Acessar Sistema </button>            
                    </div>

                </form>
            </div>
            </center>

        </div>

    </body>   


</html>