<?php
require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";

//resgatando valor da variavel(hidden) acao
$acao = $_POST['acao'];

if($acao == 1){
    //validar
    $email = $_POST['HTML_email'];
    $senha = $_POST['HTML_senha'];
    
    $status = UsuariosDAO::validarUsuario($email, $senha);
    
    if($status == true){
        echo "<script>alert('OK!');</script>";        
    }else{
        echo "<script>alert('ERRO!');</script>";
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