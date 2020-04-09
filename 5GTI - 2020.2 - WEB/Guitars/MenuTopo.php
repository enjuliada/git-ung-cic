<nav class="navbar navbar-expand-lg bg-dark" style="height:50px;">
    <div class="collapse navbar-collapse" id="DivMenu">
        <div class="navbar navbar-brand">
            <i class="fa fa-500px fa-lg text-white" style="padding-bottom:0px;"></i>
        </div>

        <div class="navbar-nav col-md-6">
            <a href="index.php" class="navbar-brand text-white" style="padding-bottom:10px;">
                Guitars
            </a>

            <a href="Produtos.php" class="nav-item text-white" style="padding-left:80px;padding-top:12px;">
                <i class="fa fa-product-hunt fa-lg"></i>
                Produtos
            </a>

            <a href="Login.php" class="nav-item text-white" style="padding-left:80px;padding-top:12px;">
                <i class="fa fa-lock fa-lg"></i>
                Área Restrita
            </a>

            <a href="Contato.php" class="nav-item text-white" style="padding-left:80px;padding-top:12px;">
                <i class="fa fa-comments fa-lg"></i>
                Fale Conosco
            </a>
        </div>

        <div class="col-md-5">
            <form action="Login.php" method="POST">
                <div class="form-row">
                    <div class="col-md-4">    
                        <input type="email" placeholder="Informe o e-mail" name="HTML_login" class="form-control" style="width:250px;margin-top:10px;">
                    </div>
                    <div class="col-md-4">    
                        <input type="password" placeholder="Senha" name="HTML_senha" class="form-control" style="width:250px;margin-top:10px;">
                    </div>
                    <div class="col-md-2">    
                        <button type="submit" class="btn btn-dark border text-white" style="width:120px;margin-top:10px;">Entrar</button>
                    </div>
                    <div class="col-md-2">    
                        <button class="btn btn-dark border text-white" style="width:140px;margin-top:10px;">Registrar-se</button>
                    </div>
                    
                </div>

            </form>
        </div>

    </div>
</nav>