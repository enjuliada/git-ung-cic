<meta charset="utf-8">

<?php

session_start();

require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";

//resgatando valor da variavel(hidden) acao


if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
}else{
    $acao = $_GET['acao'];
}

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
}else if($acao == 3){
    //logoff
    session_destroy();
    echo "<script>location.href='../../index.php';</script>";//redirecionando
    
}else if($acao == 4){
    //add integrante
    
    $email = $_POST['HTML_usuario'];
    $proj = $_POST['proj'];
    
    $status = UsuariosDAO::adicionarIntegrante($email, $proj);
    
    if($status == 0){
        echo "<script>alert('Usuário inexistente no sistema.');</script>";
    }else if($status == -1){
        echo "<script>alert('Usuário já pertence ao projeto.');</script>";
    }else{
        echo "<script>alert('Usuário adicionado à equipe.');</script>";
    }
    
    echo "<script>location.href='../UI/DetalhesProjetoUI.php?cod=$proj';</script>";//redirecionando
    
}else if($acao == 5){ //enviar Email
    
    $remetente = $_SESSION['email'];
    $destinatario = $_POST['HTML_email'];
    
    $headers = "MIME-Version:1.1\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    $headers .= "From:" . $remetente ."\r\n";
    $headers .= "Return-Path:" . $remetente ."\r\n";
    
    $assunto = "Mensagem do Sistema: Tarefa";
    $msg = $_POST['HTML_msg'];
    
    $status = mail($destinatario, $assunto, $msg, $headers);
    
    if($status){
        echo "<script>alert('Mensagem Enviada.');</script>";
    }else{
        echo "<script>alert('Falha no envio.');</script>";
    }
    
    echo $destinatario . "<hr>" . $msg;
    
}else if($acao == 6){ //alterar dados
    
    $tmpUsuario = new Usuarios();
    
    $nome = $_POST['HTML_nome'];
    $telefone = $_POST['HTML_telefone'];
    $email = $_POST['HTML_email'];
    
    $tmpUsuario->setNome($nome);
    $tmpUsuario->setTelefone($telefone);
    $tmpUsuario->setEmail($email);
    
    $emailAtual = $_SESSION['email'];
    
    UsuariosDAO::alterarUsuario($tmpUsuario, $emailAtual);
    echo "<script>alert('Dados Alterados.');</script>";
    
    $_SESSION['nome'] = $nome;
    $_SESSION['telefone'] = $telefone;
    $_SESSION['email'] = $email;
    
    echo "<script>location.href='../UI/HomeUsuariosUI.php';</script>";//redirecionando
    
    
}else if($acao == 7){ //alterar senha
    
}

?>