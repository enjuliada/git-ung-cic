<html>
    <head>
        <!--referencia do CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css" type="text/css">

        <!--Configurações da pagina-->
        <meta charset="utf-8">
        <title>:: GUITARS :: Play your weapon!</title>

    </head>

    <body>
        <!--Conteudo da página -->
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12" id="DivMenu">
                    <?php
                    include "MenuTopo.php";
                    ?>
                </div>

            </div>


            <div class="row">

                <div class="col-md-12" id="DivBanner">
                    <img src="img/banner.jpg" width="100%" style="padding-top:25px;">
                    <hr color="white">
                </div>

            </div>

            <div class="row">

                <div class="col-md-4 text-center" id="DivCard1">
                    <div class="card col-md-12" id="Cards">
                        <div class="card-body">
                            <img src="img/img3.jpg" class="ImgCard">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Modelos</font></center><br>
                            Confira os diversos modelos de guitarras, 
                            adaptados ao seu estilo, influências e gênero musical.
                        </div>                        
                    </div>
                </div>

                <div class="col-md-4 text-center" id="DivCard2">
                    <div class="card col-md-12" id="Cards">

                        <div class="card-body">
                            <img src="img/img2.jpg" class="ImgCard">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Tablaturas</font></center><br>
                            Selecione seu artista, música, acesse a tablatura e saia tocando como profissional
                            utilizando todas as técnicas. 
                        </div>                        
                    </div>
                </div>

                <div class="col-md-4 text-center" id="DivCard3">
                    <div class="card col-md-12" id="Cards">
                        <div class="card-body">
                            <img src="img/img1.jpg" class="ImgCard">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Aulas</font></center><br>
                            Se inscreva em nosso canal, acesse as vídeo aulas, pratique e evolua, desde o nível iniciante até o avançado. 
                        </div>                        
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">

                <div class="col-md-4 text-center" id="DivCard4">
                    <div class="card col-md-12" id="Cards">
                        <div class="card-body">
                            <img src="img/img4.jpg" class="ImgCard">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Comparações</font></center><br>
                            Comparativo entre modelos de guitarras, marcas, definição de timbres, 
                            madeiras e captadores. 
                        </div>                        
                    </div>
                </div>

                <div class="col-md-4 text-center" id="DivCard5">
                    <div class="card col-md-12" id="Cards">
                        <div class="card-body">
                            <img src="img/img5.png" class="ImgCard">
                        </div>
                        <div class="card-footer">
                            <center><font class="TituloCard">Bandas</font></center><br>
                            Acompanhe os guitarristas das melhores bandas, monte sua gear e
                            saia tocando seus covers de sucesso.
                        </div>                        
                    </div>
                </div>

                <div class="col-md-4 text-center" id="DivCard6">
                    6
                </div>

            </div>

            <div class="row">
                <div class="col-md-12" id="DivRodape">
                    Rodapé
                </div>
            </div>


        </div> <!-- fechando container -->

    </body>

</html>