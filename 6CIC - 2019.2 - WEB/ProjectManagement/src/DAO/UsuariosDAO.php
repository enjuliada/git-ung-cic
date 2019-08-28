<?php
//referenciando arquivos de classes que 
//terão metodos utilizados
require_once "../Model/Usuarios.php";
require_once "ConexaoDAO.php";

class UsuariosDAO {
    
    public static function cadastrarUsuario($tmpUsuario){
     
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlCadastra = "Insert into usuarios(";
        $sqlCadastra .= "email_USUARIO, nome_USUARIO,";
        $sqlCadastra .= "senha_USUARIO,telefone_USUARIO)";
        $sqlCadastra .= "values(";
        $sqlCadastra .= "'" . $tmpUsuario->getEmail() . "',";
        $sqlCadastra .= "'" . $tmpUsuario->getNome() . "',";
        $sqlCadastra .= "'" . md5($tmpUsuario->getSenha()) . "',";
        $sqlCadastra .= "'" . $tmpUsuario->getTelefone() . "')";
        
        //executando SQL e interrompendo a execução do metodo
        //em caso de erro
        mysqli_query($vConn, $sqlCadastra) 
                or die(mysqli_error($vConn));
        
        return true;
    }

    
    
    
    public static function validarUsuario($tmpEmail, $tmpSenha){
     
        
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlLogin = "Select * from usuarios where ";
        $sqlLogin .= "email_USUARIO like '$tmpEmail' and ";
        $sqlLogin .= "senha_USUARIO like '". md5($tmpSenha) . "'";
        
        $rsLogin = mysqli_query($vConn,$sqlLogin)
                or die(mysqli_error($vConn));
        
        //se numero de linhas do select for maior que 0
        if(mysqli_num_rows($rsLogin)>0){
            return true;
        }else{
            return false;
        }
        
        
        
    }
    
}//fechando classe
