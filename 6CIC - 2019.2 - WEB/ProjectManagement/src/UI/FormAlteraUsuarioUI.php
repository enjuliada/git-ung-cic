<?php
require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";

$email = $_GET['user'];

$tmpDados = UsuariosDAO::consultarUsuario($email);
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
       
        
    </head>

    <body>   
        <div class="container">
            <center>
                <div class="col-md-6 border"style="margin-top:100px;">
                    <form action="../Control/UsuariosControl.php" method="post">
                        <p>
                            Preencha corretamente os dados abaixo para efetuar o cadastro no sistema
                        </p>

                        <div class="form-group">
                            <input type="text" name="HTML_nome" placeholder="Nome Completo" class="form-control" value="<?= $tmpDados->getNome(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="HTML_email" placeholder="Digite seu e-mail" class="form-control" value="<?= $tmpDados->getEmail(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="number" name="HTML_telefone" placeholder="Telefone (apenas números)" class="form-control" value="<?= $tmpDados->getTelefone(); ?>">
                        </div>

                        <div class="form-group" style="text-align:right;">
                            <input type = "hidden" name="acao" value="6">
                            <button type="submit" class="btn btn-primary">Alterar Dados</button> 
                        </div>
                    </form>
                    
                    <hr> <!-- separação dos formularios -->
                    
                    <p>
                        Alteração de Senha
                    </p>
                    <form action="../Control/UsuariosControl.php" method="post">
                        <div class="form-group">
                            <input type="password" name="HTML_senha" placeholder="Digite a nova senha" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="HTML_confsenha" placeholder="Confirme a senha" class="form-control">
                        </div>
                        
                        <input type="hidden" name="acao" value="7">
                        <button type="submit" class="btn btn-primary float-right">Alterar Senha</button>
                    </form>

                </div>
            </center>
        </div>

    </body>   


</html>