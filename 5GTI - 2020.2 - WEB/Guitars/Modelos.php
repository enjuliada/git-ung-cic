<html>
    <head>
        <!--referencia do CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Itim|Sriracha&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo.css" type="text/css">

        <!--Configurações da pagina-->
        <meta charset="utf-8">
        <title>:: GUITARS :: Play your weapon!</title>

        <script src="js/funcoes.js" type="text/javascript"></script>

        
    </head>

    <body>
        <?php
        include "MenuTopo.php";
        ?>

        <div class="container-fluid" id="DivAll">
            <div class="row">

                <div class="col-md-12" id="DivBanner">
                    <img src="img/banner.jpg" width="100%" style="padding-top:25px;">
                </div>

            </div> 

            <div class="row">
                <div class="col-md-12 text-center" id="DivTitulo">
                    <hr color="white">
                    <font class="TituloPagina">Modelos</font>
                    <hr color="white">
                </div>
            </div>             

            <div class="row">

                <div class="col-md-3" id="DivMod1">

                    <div class="card" id="CardMod1">
                        <div class="card-body text-center">

                            <a href="#" onclick="mostrar(1);">
                                <img src="img/teleMini.jpg" class="ImgMod">
                            </a>

                        </div>
                        <div class="card-footer" style="padding-top:0px;">
                            <center>
                                <a class="TituloMod">Telecaster</a>
                            </center>
                        </div>
                    </div>

                </div>

               
            </div>

        </div>


        <div id="DivInfo1">
            <div class="card" id="CardInfo">
                <center>
                    <font class="TituloMod">Telecaster</font>                

                    <a href="#" onclick="ocultar(1);">
                        <i class="fa fa-close fa-2x text-white float-right"></i>
                    </a>

                    <br><br>
                    <a href="teste.php"><img src="img/telebutter.jpg" id="ImgInfo"></a>

                    <p>
                        A Fender Telecaster foi desenvolvida por Leo Fender em Fullerton, Califórnia em 1950. No período de aproximadamente entre 1932-1949, muitos artesãos e empresas experimentaram guitarras elétricas de corpo sólido, mas nenhuma teve um impacto significativo no mercado. A Telecaster de Leo Fender foi o projeto que, finalmente, colocou a guitarra de corpo sólido no mapa. 
                    </p>

                </center>

            </div>
        </div>

   




    </body>

</html>