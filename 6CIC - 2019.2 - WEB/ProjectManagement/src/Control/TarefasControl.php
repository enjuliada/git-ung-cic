<?php

require_once "../Model/Tarefas.php";
require_once "../DAO/TarefasDAO.php";

session_start();

//resgatando variavel acao(hidden) do form
if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
}else{
    if(isset($_GET['acao'])){
        $acao = $_GET['acao'];
    }
}

if ($acao == 1) {
    //listarTarefas
} else if ($acao == 2) {
    //cadastrarTarefa

    /* resgatando dados do form */
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
} else if ($acao == 3) {
    $tar = $_GET['tar'];
    $proj = $_GET['proj'];
    
    TarefasDAO::alterarStatus($tar);
        
    echo "<script>location.href='../UI/DetalhesTarefaUI.php?proj=" . $proj . "&tar=" . $tar . "';</script>";
}
?>


