<nav class="navbar navbar-expand-lg MenuTopo">
    <div class="collapse navbar-collapse">
        
        <div class="nav navbar-brand col-lg-1">
            
            <a href="Painel.php">                                
                <font class="LinkTopo">
                    <i class="fa fa-home fa-2x Icones border rounded"></i>
                </font>
            </a>
        </div>  
        
        <div class="navbar-nav col-lg-2 justify-content-md-center">
            <a href="?idPg=10">
                <font class="LinkTopo">
                <i class="fa fa-users fa-md"></i>
                    CLIENTES
                </font>
            </a>
        </div>  
        
        <div class="navbar-nav col-lg-2 justify-content-md-center">
            <a href="?idPg=20">
                <font class="LinkTopo">
                <i class="fa fa-user-secret fa-md"></i>
                    FUNCIONÁRIOS
                </font>
            </a>
        </div> 
        
        <div class="navbar-nav col-lg-2 justify-content-md-center">
            <a href="?idPg=50">
                <font class="LinkTopo">
                <i class="fa fa-shopping-bag fa-md"></i>
                    ESTOQUE
                </font>
            </a>
        </div> 
        
        <div class="navbar-nav col-lg-2 justify-content-md-center">
            <a href="?idPg=60">                
                <font class="LinkTopo">
                    <i class="fa fa-shopping-basket fa-md"></i>
                    VENDAS
                </font>
            </a>
        </div>  
        
        <div class="col-lg-2 justify-content-md-center text-white text-center">
            <font class="TextoDados">
            Olá, <?=$_SESSION['nome'];?>             
            <br>
            <?=$_SESSION['horaLogin'];?>             
            </font>
        </div> 
        
        <div class="navbar-nav col-lg-1 justify-content-md-center">
            <a href="Logout.php">                
                <font class="LinkTopo">
                    <i class="fa fa-sign-out fa-2x"></i>                    
                </font>
            </a>
        </div>  
        
    </div>    
</nav>
