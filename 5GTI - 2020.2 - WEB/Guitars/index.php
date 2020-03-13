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

    </head>

    <body> 
        
            <?php
            include "MenuTopo.php";
            ?>
        
        <!--Conteudo da página -->
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12" id="DivBanner">
                    <img src="img/banner.jpg" width="100%" style="padding-top:25px;">
                </div>

            </div> 
            
            <div class="row">

                <div class="col-md-4 text-center" id="DivCard1">
                    <a href="Modelos.php">
                    <div class="card col-md-12 border" id="Cards">
                        <div class="card-body ">
                            <img src="img/img3.jpg" class="img-thumbnail">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Modelos</font></center><br>
                            <font class="TextoSimples">
                            Confira os diversos modelos de guitarras, 
                            adaptados ao seu estilo e influências.
                            </font>
                        </div>                        
                    </div>
                    </a>
                </div>

                <div class="col-md-4 text-center" id="DivCard2">
                    <div class="card col-md-12 border" id="Cards">

                        <div class="card-body">
                            <img src="img/img2.jpg" class="img-thumbnail">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Tablaturas</font></center><br>
                            Selecione seu artista, música, acesse a tablatura e toque suas músicas preferidas. 
                        </div>                        
                    </div>
                </div>

                <div class="col-md-4 text-center" id="DivCard3">
                    <div class="card col-md-12 border" id="Cards">
                        <div class="card-body">
                            <img src="img/img1.jpg" class="img-thumbnail">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Aulas</font></center><br>
                            Se inscreva em nosso canal, acesse as vídeo aulas, pratique e evolua, do nível iniciante ao avançado. 
                        </div>                        
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">

                <div class="col-md-4 text-center" id="DivCard4">
                    <div class="card col-md-12 border" id="Cards">
                        <div class="card-body">
                            <img src="img/img4.jpg" class="img-thumbnail">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Comparações</font></center><br>
                            Comparativo entre modelos de guitarras, marcas, timbres, 
                            madeiras e captadores. 
                        </div>                        
                    </div>
                </div>

                <div class="col-md-4 text-center" id="DivCard5">
                    <div class="card col-md-12 border" id="Cards">
                        <div class="card-body">
                            <img src="img/img5.png" class="img-thumbnail">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Bandas</font></center><br>
                            Acompanhe os guitarristas das melhores bandas, e
                            saia tocando seus covers de sucesso.
                        </div>                        
                    </div>
                </div>

                <div class="col-md-4 text-center" id="DivCard6">
                     <div class="card col-md-12 border" id="Cards">
                        <div class="card-body">
                            <img src="img/img6.jpg" class="img-thumbnail">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Coleções</font></center><br>
                            Conheça nossa coleção e história de cada um dos instrumentos.
                        </div>                        
                    </div>
                </div>

            </div>
</div> <!-- fechando container -->
            <?php
                include "Rodape.php";
            ?>


        

    </body>

</html>