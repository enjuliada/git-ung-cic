<?php

class ConexaoDAO{
    
    public $conn;
    
    function abrirConexao(){
         $conn = mysqli_connect("localhost","root","","northwind");
                  
         return $conn;
    }
}
