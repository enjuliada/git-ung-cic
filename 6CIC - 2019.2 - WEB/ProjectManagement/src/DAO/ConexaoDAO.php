<?php

class ConexaoDAO {

    public static  function abrirConexao(){
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "6cicm";
        
        //estabelecendo conexao com base de dados
        //e armazenando conexao ativa na variavel vConn
        $vConn = mysqli_connect($server,$user,$pass,$database);  
        mysqli_set_charset($vConn, "utf8");//compatibilizando caracteres do BD
        
        return $vConn;     
    }
    
    public static function fecharConexao(){
        
    }
    
}


?>
