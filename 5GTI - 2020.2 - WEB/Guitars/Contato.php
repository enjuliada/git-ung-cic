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
                <div class="col-md-12 text-center">
                    <font class="TituloPagina">Informações de Contato</font>

                    <hr color="#CCCCCC">
                </div>

            </div>


            <div class="row">

                <div class="col-md-2">
                </div>

                <div class="col-md-3 border">

                    <form action="Email.php" method="POST">

                        <div class="form-group">
                            <label>Nome Completo:</label>
                            <input type="text" name="HTML_nome" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Endereço de E-mail:</label>
                            <input type="email" name="HTML_email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Assunto:</label>
                            <select name="HTML_assunto" class="form-control">
                                <option value="Dúvidas">Dúvidas</option>
                                <option value="Informações">Informações</option>
                                <option value="Aulas">Aulas</option>
                            </select>    
                        </div>

                        <div class="form-group">
                            <label>Mensagem:</label>
                            <textarea name="HTML_mensagem" class="form-control" style="height:80px; "></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark float-right">Enviar Mensagem</button>
                        </div>

                        <br><br>
                    </form>

                </div>

                <div class="col-md-2 text-center">

                    <i class="fa fa-youtube fa-3x"></i>  <br><br>
                    <font class="TextoSimples">
                    www.youtube.com.br/channel/joaortiz
                    </font>

                    <br><br>

                    <i class="fa fa-whatsapp fa-3x"></i>  <br><br>
                    <font class="TextoSimples">
                    (11)95555-1234
                    </font>

                    <br><br>

                    <i class="fa fa-instagram fa-3x"></i>  <br><br>
                    <font class="TextoSimples">
                    @joaoortizusa
                    </font>

                    <br><br>

                    <i class="fa fa-envelope fa-3x"></i>  <br><br>
                    <font class="TextoSimples">
                    jportiz@prof.ung.br
                    </font>

                </div>

                <div class="col-md-3 border text-center">
                    <font class="TituloMod">Localização</font><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.725612606488!2d-46.53487468502403!3d-23.47035998472811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef55eae2185ef%3A0x107c40dad3a4a5e2!2sUNG%20-%20Universidade%20Guarulhos!5e0!3m2!1spt-BR!2sbr!4v1585869669450!5m2!1spt-BR!2sbr" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <br><br>   
                    <font class="TituloCard">
                    R. Eng. Prestes Maia, 88 
                    <br>
                    Centro - Guarulhos
                    <br>
                    07023-070
                    </font>
                    <br><br>
                </div>

                <div class="col-md-2">

                </div>

            </div>

        </div>
        <br>
        <?php
        include "Rodape.php";
        ?>

    </body>

</html>