<?php
require_once "ConexaoDAO.php";
require_once "../Model/Tarefas.php";
require_once "../Model/Arquivos.php";

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
        $vConn = ConexaoDAO:: abrirConexao();
        
        $sqlTar = "Select * from Tarefas T where ";
        $sqlTar .= "T.codigo_TAREFA = '$tmpCodigo'";
               
        $rsTar = mysqli_query($vConn, $sqlTar)
                        or die(mysqli_error($vConn));
        
        $tblTar = mysqli_fetch_array($rsTar);
        
        $tmpTarefa = new Tarefas();
        
        $tmpTarefa->setCodigo($tblTar['codigo_TAREFA']);
        $tmpTarefa->setNome($tblTar['nome_TAREFA']);
        $tmpTarefa->setDescricao($tblTar['descricao_TAREFA']);
        $tmpTarefa->setData($tblTar['data_TAREFA']);
        $tmpTarefa->setStatus($tblTar['status_TAREFA']);
        $tmpTarefa->setEmailUsuario($tblTar['emailUsuario_TAREFA']);
                        
                        
        return $tmpTarefa;
    }
    public static function alterarStatus($tmpCodigo, $tmpStatusAtual){
        
        $vConn = ConexaoDAO::abrirConexao();
        
        if($tmpStatusAtual == 0){
            $novoStatus = 1; //finalizando
        }else{
            $novoStatus = 0;//reabrindo
        }
        
        $sqlStatus = "Update tarefas set status_TAREFA = '$novoStatus' where codigo_TAREFA = '$tmpCodigo'";
        
        mysqli_query($vConn, $sqlStatus)
                or die(mysqli_error($vConn));
        
    }
    public static function cadastrarArquivo($tmpArquivo){
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlArq = "Insert into arquivos(";
        $sqlArq .= "nome_ARQUIVO, data_ARQUIVO, codigoTarefa_ARQUIVO)values(";
        $sqlArq .= "'" . $tmpArquivo->getNome() . "',";
        $sqlArq .= "'" . $tmpArquivo->getData() . "',";
        $sqlArq .= "'" . $tmpArquivo->getCodigoTarefa() . "')";
        
        mysqli_query($vConn, $sqlArq) or die(mysqli_error($vConn));
        
    }
    public static function listarArquivos($tmpCodigoTar){
        
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlArq = "Select * from arquivos where codigoTarefa_ARQUIVO='$tmpCodigoTar'";
        
        $rsArq = mysqli_query($vConn, $sqlArq)
                or die(mysqli_error($vConn));
        
        $itens = new ArrayObject();
        
        while($dados = mysqli_fetch_array($rsArq)){
            $tmpArquivo = new Arquivos();
            $tmpArquivo->setCodigo($dados['codigo_ARQUIVO']);
            $tmpArquivo->setNome($dados['nome_ARQUIVO']);
            $tmpArquivo->setData($dados['data_ARQUIVO']);
            $tmpArquivo->setCodigoTarefa($dados['codigoTarefa_ARQUIVO']);
            
            $itens->append($tmpArquivo);            
        }
        
            return $itens;
    }
    public static function excluirArquivo($tmpCodigo){
        $vConn = ConexaoDAO::abrirConexao();
        $sqlDel = "Delete from arquivos where codigo_ARQUIVO = '$tmpCodigo'";
        mysqli_query($vConn, $sqlDel) or die(mysqli_error($vConn));
    }
    public static function excluirTarefa($tmpCodigo){
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlDelArq = "Delete from arquivos where codigoTarefa_ARQUIVO = '$tmpCodigo'";
        mysqli_query($vConn, $sqlDelArq) or die(mysqli_error($vConn));
        
        $sqlDelTar = "Delete from tarefas where codigo_TAREFA = '$tmpCodigo'";
        mysqli_query($vConn, $sqlDelTar) or die(mysqli_error($vConn));
                
    }
    
    
    }
?>