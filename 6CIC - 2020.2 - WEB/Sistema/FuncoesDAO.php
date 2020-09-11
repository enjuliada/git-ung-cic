<?php

include "Conexao.php";

function listarRegistros($vConn, $tabela){
    
    $sqlLista = "Select * from $tabela";
    $rsLista = mysqli_query($vConn, $sqlLista) or die(mysqli_error($vConn));
    
    return $rsLista; //retornando rsult com os dados do banco
}

?>