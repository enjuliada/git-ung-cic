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
        $sqlCadTar .= "'" . $tmpTarefa->getNome() . "',";
        $sqlCadTar .= "'" . $tmpTarefa->getDescricao() . "',";
        $sqlCadTar .= "'" . $tmpTarefa->getData() . "',0,";
        $sqlCadTar .= "'" . $tmpTarefa->getEmailUsuario() . "',";
        $sqlCadTar .= $tmpTarefa->getCodigoProjeto() . ")";

        mysqli_query($vConn, $sqlCadTar) or die(mysqli_error($vConn));
    }

//fechando metodo

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

        if (mysqli_num_rows($rsLista) <= 0) {
            return null;
        } else {
            $itens = new ArrayObject();

            while ($dados = mysqli_fetch_array($rsLista)) {
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

    public static function alterarStatus($tmpCodigo) {
        $vConn = ConexaoDAO::abrirConexao();

        $sqlTar = "Select * from TAREFAS where codigo_TAREFA = $tmpCodigo";
        $rsTar = mysqli_query($vConn, $sqlTar) or die(mysqli_error($vConn));
        $tblTar = mysqli_fetch_array($rsTar);
        $status = $tblTar['status_TAREFA'];

        if ($status == 1) {
            $novoStatus = 0;
        } else {
            $novoStatus = 1;
        }

        $sqlStTar = "Update TAREFAS set status_TAREFA = '$novoStatus' where codigo_TAREFA = '$tmpCodigo'";
        mysqli_query($vConn, $sqlStTar) or die(mysqli_error($vConn));
    }

    public static function cadastrarArquivo($tmpArquivo) {
        $vConn = ConexaoDAO::abrirConexao();
        $sqlArquivo = "Insert into arquivos(nome_ARQUIVO, data_ARQUIVO, codigoTarefa_ARQUIVO) values(";
        $sqlArquivo.= "'" . $tmpArquivo->getNome() . "','" . $tmpArquivo->getData() . "'," . $tmpArquivo->getCodigoTarefa() . ")";

        mysqli_query($vConn, $sqlArquivo) or die(mysqli_error($vConn));
    }

    public static function listarArquivos($tmpTarefa) {
        $vConn = ConexaoDAO::abrirConexao();

        $sqlLista = "Select * from arquivos where codigoTarefa_ARQUIVO = '$tmpTarefa'";

        $rsLista = mysqli_query($vConn, $sqlLista)
                or die(mysqli_error($vConn));

        if (mysqli_num_rows($rsLista) <= 0) {
            return null;
        } else {
            $itens = new ArrayObject();

            while ($dados = mysqli_fetch_array($rsLista)) {
                $tmpArquivo = new Arquivos();

                //preenchendo objeto
                $tmpArquivo->setCodigo($dados['codigo_ARQUIVO']);
                $tmpArquivo->setNome($dados['nome_ARQUIVO']);
                $tmpArquivo->setData($dados['data_ARQUIVO']);
                $tmpArquivo->setCodigoTarefa($dados['codigoTarefa_ARQUIVO']);
                
                $itens->append($tmpArquivo);
            }//fechando while           
            return $itens;
        }//fechando else
    }

}

?>