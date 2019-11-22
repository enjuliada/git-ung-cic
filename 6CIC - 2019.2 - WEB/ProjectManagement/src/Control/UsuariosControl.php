
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
    $email = $_POST['HTML_usuario'];
    $proj = $_POST['proj'];
    
    $status = UsuariosDAO::adicionarIntegrante($email, $proj);
    
    if($status == 0){
        echo "<script>alert('Usuário não cadastrado.');</script>";
    }else if($status == -1){
        echo "<script>alert('Usuário já pertence ao projeto.');</script>";
    }else{
        echo "<script>alert('Usuário adicionado à equipe.');</script>";
    }
    
    echo "<script>location.href='../UI/DetalhesProjetoUI.php?cod=$proj';</script>";//redirecionando

    
    }else if($acao == 5){ //email
        $destinatario = $_POST['HTML_email'];
        $remetente = $_SESSION['email'];
        $assunto = "Mensagem do sistema - TAREFAS";
        $mensagem = $_POST['HTML_msg'];
        
        $headers = "MIME Version: 1.1\r\n";
        $headers .= "Content-type: text/plain;charset=UTF-8\r\n";
        $headers .= "From: " . $remetente . "\r\n";
        $headers .= "Return-path: " . $remetente . "\r\n";
        
        $status = mail($destinatario,$assunto,$mensagem, $headers);
    
        if($status){
          echo "<script>alert('E-mail enviado.');</script>";  
        }else{
            echo "<script>alert('Mensagem não enviada.');</script>";
        }
        
        echo "<p>" . $destinatario . "<br>" . 
                $assunto . "<hr>". $mensagem;
        
    }else if($acao == 6){
        $tmpUsuario = new Usuarios();
        $tmpUsuario->setNome($_POST['HTML_nome']);
        $tmpUsuario->setTelefone($_POST['HTML_telefone']);
        $tmpUsuario->setEmail($_POST['HTML_email']);
                
        $emailAtual = $_SESSION['email'];
        
        UsuariosDAO::alterarDados($tmpUsuario, $emailAtual);
        echo "<script>alert('Dados Alterados!');</script>";//aviso
        
        $_SESSION['nome'] = $tmpUsuario->getNome();
        $_SESSION['telefone'] = $tmpUsuario->getTelefone();
        $_SESSION['email'] = $tmpUsuario->getEmail();
        
        echo "<script>location.href='../UI/HomeUsuariosUI.php';</script>";//redirecionando
        
        
    }else if($acao == 7){ //alterar senha
    
        $novaSenha = md5($_POST['HTML_senha']);
        $email = $_SESSION['email'];
        
        UsuariosDAO::alterarSenha($novaSenha, $email);
        
        echo "<script>alert('Senha Alterada!');</script>";//aviso
        echo "<script>location.href='../../index.php';</script>";//redirecionando
    }
    
    

?>