
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/cores.css">
    </head>

    <body>   

        <div class="container">
            <center>
                <div class="col-md-5 border" style="margin-top:150px;">
                    <form action="src/Control/UsuariosControl.php" method="post">
                        <p>Preencha os campos abaixo</p>

                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope fa- fa-fw"></i></span>
                                </div>
                                <input type="text" name="HTML_email" placeholder="Digite seu e-mail" class="form-control">
                            </div>

                        </div>

                        <div class="form-group"> 
                            
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key fa- fa-fw"></i></span>
                                </div>
                            <input type="password" name="HTML_senha" placeholder="Entre com a senha" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            
                            <button class="btn btn-outline-primary">
                                <a href="src/UI/FormCadastroUsuarioUI.php">
                                    Cadastre-se 
                                </a>                                
                            </button>
                            <input type = "hidden" name="acao" value="1">
                            
                            <button type="submit" class="btn bg-primary-light text-white">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                Acessar Sistema 
                                
                            </button>            
                        </div>

                    </form>
                </div>
            </center>

        </div>

    </body>   


</html>