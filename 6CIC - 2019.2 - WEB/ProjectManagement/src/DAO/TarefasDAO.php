<?php

require_once "ConexaoDAO.php";
require_once "../Model/Tarefas.php";

class TarefasDAO {

    public static function cadastrarTarefa($tmpTarefa) {
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlCadTar = "Insert into TAREFAS(";
        $sqlCadTar .= "nome_TAREFA, descricao_TAREFA,";
        $sqlCadTar .= "data_TAREFA, status_TAREFA,";
        $sqlCadTar .= "emailUsuario_TAREFA, codigoProjeto_TAREFA)";
        $sqlCadTar .= "values(";
        $sqlCadTar .= "'" . $tmpTarefa->getNome() ."',";
        $sqlCadTar .= "'" . $tmpTarefa->getDescricao() ."',";
        $sqlCadTar .= "'" . $tmpTarefa->getData() ."',0,";
        $sqlCadTar .= "'" . $tmpTarefa->getEmailUsuario() ."',";
        $sqlCadTar .= $tmpTarefa->getCodigoProjeto() . ")";
        
        mysqli_query($vConn, $sqlCadTar) or die (mysqli_error($vConn));
        
    }//fechando metodo

    public static function listarTarefas($tmpTipo, $tmpProj) {
        //PROGRAMAR
        $vConn = ConexaoDAO::abrirConexao();

        if ($tmpTipo == 0) { //todas
            $sqlLista = "Select * from TAREFAS where codigoProjeto_TAREFA = '$tmpProj'";    
        } else if ($tmpTipo == 1) {//finalizadas
            $sqlLista = "Select * from TAREFAS where codigoProjeto_TAREFA = '$tmpProj' and status_TAREFA = 1";    
       }
       
       $rsLista = mysqli_query($vConn, $sqlLista)
                  or die(mysqli_error($vConn));
       
       if(mysqli_num_rows($rsLista) <= 0){
           return null;
       }else{
           $itens = new ArrayObject();
           
           while($dados = mysqli_fetch_array($rsLista)){
               $tmpTarefa = new Tarefas();
               
                //preenchendo objeto
               $tmpTarefa->setCodigo($dados['codigo_TAREFA']);
               $tmpTarefa->setNome($dados['nome_TAREFA']);
               $tmpTarefa->setDescricao($dados['descricao_TAREFA']);
               $tmpTarefa->setData($dados['data_TAREFA']);
               $tmpTarefa->setStatus($dados['status_TAREFA']);
               $tmpTarefa->setEmailUsuario($dados['emailUsuario_TAREFA']);
               $tmpTarefa->setCodigoProjeto($dados['codigoProjeto_TAREFA']);
               
               $itens->append($tmpTarefa);
           }//fechando while           
           return $itens;
       }//fechando else
       
    }
    public static function consultarTarefa($tmpCodigo) {
        
    }

    public static function alterarStatus($tmpCodigo) {
        
    }

}

?>
