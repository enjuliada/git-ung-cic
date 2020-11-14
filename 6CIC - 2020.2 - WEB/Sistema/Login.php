<meta charset="utf-8">

<?php


//definindo fuso horario
date_default_timezone_set('America/Sao_Paulo');


session_start(); //permite o uso de sessões.
include "Conexao.php";

//Acessando(POST) as variaveis de form HTML e jogando nas variaveis PHP
$emailUsuario = $_POST['HTML_email'];
$senhaUsuario = md5($_POST['HTML_senha']); //criptografia md5
        

//montagem da instrução SQL para o login (variaveis PHP)
$sqlLogin = "Select * from users where UserId like '$emailUsuario' and ";
$sqlLogin .= "Password like '$senhaUsuario'";


//executando o SELECT e armazenando o retorno em um resultSet (rs)
$rsLogin = mysqli_query($vConn, $sqlLogin) or die(mysqli_error($vConn));


//mysqli_num_rows (retorna o numero de registros do select)
if(mysqli_num_rows($rsLogin) > 0){    
    //abertura do resultSet para acesso aos dados
    $dadosLogin = mysqli_fetch_array($rsLogin);
    
    //Abrindo sessão
    $_SESSION['nome'] = $dadosLogin['Username'];
    $_SESSION['imagem'] = $dadosLogin['Picture'];
    $_SESSION['horaLogin'] = "Acesso em " . date("d-m-Y") . " às " . date("h:i:s");
    $_SESSION['permissao'] = $dadosLogin['Permission'];    
    $_SESSION['statusLogin'] = 1;   
    $_SESSION['itens'] = "";
                 
    echo "<script>location.href='Painel.php';</script>";
    
}else{
    //alerta de mensagem 
    $_SESSION['statusLogin'] = 0;
    
    echo "<script>alert('Dados Inválidos!');</script>";
    echo "<script>location.href='index.php';</script>";//redirecionando
    
    
}


?>