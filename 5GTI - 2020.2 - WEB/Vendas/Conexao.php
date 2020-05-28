<?php

// A finalidade desse arquivo é conectar a aplicação com o BD
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "bdvendas_5GTI";

//linha de conexao
$vc = mysqli_connect($servidor,$usuario,$senha,$banco);
mysqli_set_charset($vc, "utf8");


?>