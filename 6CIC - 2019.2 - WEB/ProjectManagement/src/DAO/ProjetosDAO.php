<?php
require_once "ConexaoDAO.php";
require_once "../Model/Projetos.php";

class ProjetosDAO {

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
