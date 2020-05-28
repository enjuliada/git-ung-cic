<?php
    include "Conexao.php";
    
    //pegar info do formulario e jogar em variaveis
    $nome = $_POST['HTML_nome'];
    $cat = $_POST['HTML_categoria'];
    $marca = $_POST['HTML_marca'];
    $valor = $_POST['HTML_valor'];
    $desc = $_POST['HTML_descricao'];
    $imagem = $_POST['HTML_imagem'];

    $sqlCad = "Insert into produtos(";
    $sqlCad .= "nome, marca, descricao, valor, imagem, codigoCategoria)";
    $sqlCad .= "values(";
    $sqlCad .= "'$nome','$marca','$desc','$valor','$imagem','$cat')";

    mysqli_query($vc, $sqlCad) or die(mysqli_error($vc));
    
    echo "<script>alert('Informações cadastradas');</script>";
    echo "<script>location.href='FormCadastro.php';</script>"; 

?>