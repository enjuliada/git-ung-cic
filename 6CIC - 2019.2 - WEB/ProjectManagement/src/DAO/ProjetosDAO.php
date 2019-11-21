<?php
require_once "ConexaoDAO.php";
require_once "TarefasDAO.php";
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
    
    public static function consultarProjeto($tmpCodigo){
        
        $vConn = ConexaoDAO:: abrirConexao();
        
        $sqlProj = "Select * from Projetos P where ";
        $sqlProj .= "P.codigo_PROJETO = '$tmpCodigo'";
        //$sqlProj .= "P.codigo_PROJETO = E.codigoProjeto_EQUIPE and ";
        //$sqlProj .= "E.emailUsuario_EQUIPE = U.email_USUARIO";
        
        $rsProj = mysqli_query($vConn, $sqlProj)
                        or die(mysqli_error($vConn));
        
        $tblProj = mysqli_fetch_array($rsProj);
        
        $tmpProjeto = new Projetos();
        
        $tmpProjeto->setCodigo($tblProj['codigo_PROJETO']);
        $tmpProjeto->setNome($tblProj['nome_PROJETO']);
        $tmpProjeto->setDescricao($tblProj['descricao_PROJETO']);
        $tmpProjeto->setInicio($tblProj['inicio_PROJETO']);
        $tmpProjeto->setFim($tblProj['fim_PROJETO']);
        $tmpProjeto->setEmailUsuario($tblProj['emailUsuario_PROJETO']);
                        
                        
        return $tmpProjeto;
    }//fechando consultarProjeto
        
    public static function corrigirData($tmpData){
        
        $vData = explode('-', $tmpData);        
        $novaData = $vData[2] . "/" . $vData[1] . "/" . $vData[0];
        
        return $novaData;        
    }
    
    public static function medirProjeto($tmpInicio, $tmpFim){
        $dtInicial = new DateTime($tmpInicio);
        $dtFinal = new DateTime($tmpFim);
        $dtHoje = new DateTime(date('Y-m-d'));
        
        $dias = $dtInicial->diff($dtFinal)->days;
        $hoje = $dtInicial->diff($dtHoje)->days; 
        
        $porcent = ($hoje/$dias)*100;        
        
        return number_format($porcent,1);
        
        
    }
   
    public static function contarDias($tmpFim){
        
        $dtFinal = new DateTime($tmpFim);
        $dtHoje = new DateTime(date('Y-m-d'));
        
        $rest = $dtFinal->diff($dtHoje)->days;
        
        return $rest;
        
    }

    public static function calcularProgresso($tmpCodigo){
        
        $total = TarefasDAO::listarTarefas(0, $tmpCodigo);
        $concluidas = TarefasDAO::listarTarefas(1, $tmpCodigo);
                
        if($total == null){
            return 0;
        }else{
            $total = count($total);
            $concluidas = count($concluidas);
            
            if($concluidas == 0){
                return 0;
            }else{
                $prog = $concluidas/$total;
                return number_format($prog*100,0);
            }
        }        
        
        
    }
    
    public static function excluirProjeto($tmpCodigo){
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlDelEq = "Delete from equipes where codigoProjeto_EQUIPE = '$tmpCodigo'";
        mysqli_query($vConn, $sqlDelEq)or die(mysqli_error($vConn));
        $sqlDel = "Delete from projetos where codigo_PROJETO = '$tmpCodigo'";
        mysqli_query($vConn, $sqlDel)or die(mysqli_error($vConn));
    }
}
