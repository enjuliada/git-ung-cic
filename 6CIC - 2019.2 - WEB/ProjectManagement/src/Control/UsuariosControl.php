<?php

session_start();

require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";

//resgatando valor da variavel(hidden) acao
$acao = $_POST['acao'];

if($acao == 1){
    //validar
    $email = $_POST['HTML_email'];
    $senha = $_POST['HTML_senha'];
    
    $tmpUsuario = UsuariosDAO::validarUsuario($email, $senha);
    
    if($tmpUsuario != null){
        //abrindo sessão do usuario
        $_SESSION['nome'] = $tmpUsuario->getNome();
        $_SESSION['email'] = $tmpUsuario->getEmail();
        $_SESSION['telefone'] = $tmpUsuario->getTelefone();
        $_SESSION['statusLogin'] = 1; //certifica que logou
        
        echo "<script>location.href='../UI/HomeUsuariosUI.php';</script>";
        
    }else{
        echo "<script>alert('Dados Inválidos!');</script>";//aviso
        echo "<script>location.href='../../index.php';</script>";//redirecionando
    }
    
    
    
    
}else if($acao == 2){
    //cadastrar
    
    //resgatando dados digitados no form
    $email = $_POST['HTML_email'];
    $nome = $_POST['HTML_nome'];
    $senha = $_POST['HTML_senha'];
    $telefone = $_POST['HTML_telefone'];
    
    //instanciando objeto da classe usuarios
    $tmpUsuario = new Usuarios();
    
    //preenchendo objeto
    $tmpUsuario->setEmail($email);
    $tmpUsuario->setNome($nome);
    $tmpUsuario->setSenha($senha);
    $tmpUsuario->setTelefone($telefone);
    
    UsuariosDAO::cadastrarUsuario($tmpUsuario);//cadastrando
    
    echo "<script>alert('Dados Cadastrados.');</script>";
    echo "<script>location.href='../../index.php';</script>";//redirecionando
    
    //header("location:../../index.php");
}

?>