<?php
require_once "ConexaoDAO.php";
require_once "../Model/Projetos.php";

class ProjetosDAO {
    
    public static function listarProjetos($tmpTipo, $tmpEmail, $tmpNome){
        
        $vConn = ConexaoDAO::abrirConexao();
        
        if($tmpTipo == 0){ //todos
            $sqlProj = "Select * from projetos P, categorias C where P.codigoCategoria_PROJETO = C.codigo_CATEGORIA";
        }else if($tmpTipo == 1){ //do usuario
            $sqlProj = "Select * from projetos P, categorias C where P.emailUsuario_PROJETO like '$tmpEmail' and P.codigoCategoria_PROJETO = C.codigo_CATEGORIA";
        }else if($tmpTipo == 2){ //busca por nome
            $sqlProj = "Select * from projetos P, categorias C where P.nome_PROJETO like '%$tmpNome%' and P.codigoCategoria_PROJETO = C.codigo_CATEGORIA";
        }
        
        $rsProj = mysqli_query($vConn,$sqlProj) or die(mysqli_error($vConn));
        
        if(mysqli_num_rows($rsProj) == 0){
            return null;
        }else{
            //criando array de projetos
            $itens = new ArrayObject();
            
            while($dados = mysqli_fetch_array($rsProj)){
                
                $tmpProjeto = new Projetos();
                
                $tmpProjeto->setCodigo($dados['codigo_PROJETO']);
                $tmpProjeto->setNome($dados['nome_PROJETO']);
                $tmpProjeto->setDescricao($dados['descricao_PROJETO']);
                $tmpProjeto->setInicio($dados['inicio_PROJETO']);
                $tmpProjeto->setFim($dados['fim_PROJETO']);
                $tmpProjeto->setStatus($dados['status_PROJETO']);
                $tmpProjeto->setEmailUsuario($dados['emailUsuario_PROJETO']);
                $tmpProjeto->setCodigoCategoria($dados['codigo_CATEGORIA']);
                $tmpProjeto->setNomeCategoria($dados['nome_CATEGORIA']);
                
                $itens->append($tmpProjeto);               
            }//fechando while
             
            return $itens;
            
        }//fecha else      
        
    }//fechando listarProjetos
    
    
    public static function contarProjetos($tmpEmail){
        $itens = ProjetosDAO::listarProjetos(1, $tmpEmail, "");
        return count($itens);
    }
    

    public static function cadastrarProjeto($tmpProjeto){
        
        $vConn = ConexaoDAO::abrirConexao();
        
        //Construção do INSERT
        $sqlCadProj = "Insert into projetos";
        $sqlCadProj .= "(nome_PROJETO, descricao_PROJETO,";
        $sqlCadProj .= "inicio_PROJETO, fim_PROJETO,";
        $sqlCadProj .= "status_PROJETO, emailUsuario_PROJETO,";
        $sqlCadProj .= "codigoCategoria_PROJETO) values(";
        $sqlCadProj .= "'" . $tmpProjeto->getNome() . "',";
        $sqlCadProj .= "'" . $tmpProjeto->getDescricao() . "',";
        $sqlCadProj .= "'" . $tmpProjeto->getInicio() . "',";
        $sqlCadProj .= "'" . $tmpProjeto->getFim() . "',0,";
        $sqlCadProj .= "'" . $tmpProjeto->getEmailUsuario() . "',";
        $sqlCadProj .= $tmpProjeto->getCodigoCategoria() . ")";
        
        //executando o INSERT
        mysqli_query($vConn,$sqlCadProj)or die(mysqli_error($vConn));
        
    }//fechando cadastrarProjeto
    
}
