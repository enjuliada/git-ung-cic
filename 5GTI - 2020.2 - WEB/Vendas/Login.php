<?php

include "Conexao.php";

//pegando variaveis de form
$usuario = $_POST['HTML_LOGIN'];
$senha = $_POST['HTML_SENHA'];


//fazendo select no banco
$sqlLogin = "Select * from usuarios where email like '$usuario' and senha like '$senha'";
$rsLogin = mysqli_query($vc, $sqlLogin);

if(mysqli_num_rows($rsLogin)> 0){
    //se o login estiver ok no BD vai pra pagina de cadastro.
    echo "<script>location.href='FormCadastro.php';</script>";    
}else{
    //exibe msg de erro e volta pra index.
    echo "<script>alert('Dados inválidos');</script>";
    echo "<script>location.href='index.php';</script>";    
}
    

?>
