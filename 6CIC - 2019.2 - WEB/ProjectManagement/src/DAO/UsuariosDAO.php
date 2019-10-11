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
             
            $dados = mysqli_fetch_array($rsLogin);//abrindo o resultset
            
            $tmpUsuario = new Usuarios();             
             //preenchendo objeto
             $tmpUsuario->setEmail($dados['email_USUARIO']);
             $tmpUsuario->setNome($dados['nome_USUARIO']);
             $tmpUsuario->setTelefone($dados['telefone_USUARIO']);
            
            return $tmpUsuario;
            
        }else{
            return null;
        }
        
        
        
    }
    
    
    public static function listarIntegrantes($tmpCodigo){
      $vConn = ConexaoDAO::abrirConexao();
        
      $sqlInteg = "Select U.* from USUARIOS U, EQUIPES E ";
      $sqlInteg .= "where E.codigoProjeto_EQUIPE = '$tmpCodigo' ";
      $sqlInteg .= "and E.emailUsuario_EQUIPE = U.email_USUARIO";
      
      $rsInteg = mysqli_query($vConn,$sqlInteg)
                 or die(mysqli_error($vConn));
      
      if(mysqli_num_rows($rsInteg) == 0){
          return null;
      }else{
          
          $itens = new ArrayObject();
          
          while($dados = mysqli_fetch_array($rsInteg)){
          
              $tmpUsuario = new Usuarios();
              
              $tmpUsuario->setEmail($dados['email_USUARIO']);
              $tmpUsuario->setNome($dados['nome_USUARIO']);
              $tmpUsuario->setTelefone($dados['telefone_USUARIO']);
              
              $itens->append($tmpUsuario);
              
          }//fechando while
          
          return $itens;
          
      }//fechando else
        
    }//fechando metodo
    
    
    public static function adicionarIntegrante($tmpEmail, $tmpCodProj){
        $vConn = ConexaoDAO::abrirConexao();
        
       $sqlVerif = "Select * from usuarios where email_USUARIO like '$tmpEmail'";
       $rsVerif = mysqli_query($vConn, $sqlVerif)
               or die(mysqli_error($vConn));
       
       if(mysqli_num_rows($rsVerif) == 0){
           return 0;
       }else{
           
           $sqlEquipe = "Select emailUsuario_EQUIPE from equipes ";
           $sqlEquipe .= "where emailUsuario_EQUIPE like '$tmpEmail' and ";
           $sqlEquipe .= "codigoProjeto_EQUIPE = '$tmpCodProj'";
           $rsEquipe = mysqli_query($vConn,$sqlEquipe)
                        or die(mysqli_error($vConn));
           
           
           if(mysqli_num_rows($rsEquipe) > 0){
               return -1;
           }else{
                $sqlAdd = "Insert into equipes(";
                $sqlAdd .= "codigoProjeto_EQUIPE, emailUSUARIO_EQUIPE,";
                $sqlAdd .= "codigoPermissao_EQUIPE)values('$tmpCodProj','$tmpEmail',2)";
                
                mysqli_query($vConn, $sqlAdd) or die(mysqli_error($vConn));
                
                return 1;
           }          
           
       }
       
        
        
    }
    
    
    
}//fechando classe
