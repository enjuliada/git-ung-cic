<?php
require_once "../Model/Tarefas.php";
require_once "../DAO/TarefasDAO.php";

session_start();

//resgatando variavel acao(hidden) do form

if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
}else{
    $acao = $_GET['acao'];
}


if($acao == 1){
    //listarTarefas
    
}else if($acao == 2){
    //cadastrarTarefa
    
    /*resgatando dados do form*/
    $codigo = $_POST['codProj'];
    $nome = $_POST['HTML_nome'];
    $descricao = $_POST['HTML_descricao'];
    $data = date('Y-m-d');    
    $usuario = $_POST['HTML_usuario'];        
    
    //instanciar obj Tarefa e dps preenchendo
    $tmpTarefa = new Tarefas();
    $tmpTarefa->setNome($nome);
    $tmpTarefa->setDescricao($descricao);
    $tmpTarefa->setData($data);
    $tmpTarefa->setEmailUsuario($usuario);
    $tmpTarefa->setCodigoProjeto($codigo);
        
    TarefasDAO::cadastrarTarefa($tmpTarefa);
    
    echo "<script>alert('Tarefa cadastrada!');</script>";
    echo "<script>location.href='../UI/DetalhesProjetoUI.php?cod=" . $codigo . "';</script>";
    
}else if($acao == 3){
    //alterarStatus
    $proj = $_GET['proj'];
    $tar = $_GET['tar'];
    $statusAtual = $_GET['status'];
    
    TarefasDAO::alterarStatus($tar, $statusAtual);
    echo "<script>location.href='../UI/DetalhesTarefaUI.php?proj=$proj&cod=$tar';</script>";
        
}else if($acao == 4){ //excluir arquivo
    
    //EXCLUSÃO    
    $arq = $_GET['arq'];
    $proj = $_GET['proj'];
    $tar = $_GET['tar'];
    //Selecionar nome do arquivo
    $nomeArq = TarefasDAO::consultarArquivo($arq);
    
    unlink("../../files/". $nomeArq);    
    TarefasDAO::excluirArquivo($arq);
    
    echo "<script>alert('Arquivo Excluido!');</script>";
    echo "<script>location.href='../UI/DetalhesTarefaUI.php?proj=$proj&cod=$tar';</script>";
    
}else if($acao == 5){ //excluir tarefa
    $tar = $_GET['tar'];
    $proj = $_GET['proj'];
    
    if (!isset($_GET['conf'])){
        include "../UI/ExcluirTarefaUI.php"; //SIM NAO
    }else{
        //apagando arquivos do disco
        $itens = TarefasDAO::listarArquivos($tar);
        for($i=0; $i<count($itens); $i++){
            $nomeArq = $itens[$i]->getNome();
            
            unlink("../../files/".$nomeArq);            
        } //fechando for
        
        TarefasDAO::excluirTarefa($tar);
        echo "<script>alert('Tarefa excluída!');</script>";
        echo "<script>location.href='../UI/DetalhesProjetoUI.php?cod=" . $proj . "';</script>";
    
        
    }
}


?>


