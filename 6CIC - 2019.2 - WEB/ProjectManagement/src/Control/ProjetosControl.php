<?php
require_once "../Model/Projetos.php";
require_once "../DAO/ProjetosDAO.php";
session_start();

//resgatando variavel acao(hidden) do form
$acao = $_POST['acao'];

if($acao == 1){
    //listarProjetos
}else if($acao == 2){
    //cadastrarProjeto
    
    /*resgatando dados do form*/
    $nome = $_POST['HTML_nome'];
    $descricao = $_POST['HTML_descricao'];
    $inicio = $_POST['HTML_inicio'];
    $fim = $_POST['HTML_fim'];
    $email = $_SESSION['email'];    
    $cat = $_POST['HTML_categoria'];
    
    //instanciar obj Projeto e dps preenchendo
    $tmpProjeto = new Projetos();
    $tmpProjeto->setNome($nome);
    $tmpProjeto->setDescricao($descricao);
    $tmpProjeto->setInicio($inicio);
    $tmpProjeto->setFim($fim);
    $tmpProjeto->setEmailUsuario($email);
    $tmpProjeto->setCodigoCategoria($cat);
    
    ProjetosDAO::cadastrarProjeto($tmpProjeto);
    
    echo "<script>alert('Projeto cadastrado!');</script>";
    echo "<script>location.href='../UI/HomeUsuariosUI.php';</script>";
    
}


?>


