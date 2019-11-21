<?php

require_once "../DAO/TarefasDAO.php";
require_once "../Model/Arquivos.php";

$tar = $_POST['tar'];
$proj = $_POST['proj'];

$nomeOrig = $_FILES['HTML_arquivo']['name'];
$nomeTemp = $_FILES['HTML_arquivo']['tmp_name'];
$tamanho = $_FILES['HTML_arquivo']['size']/1024;
$tipo = $_FILES['HTML_arquivo']['type'];

$tiposPermitidos = array("txt","doc","docx","pdf","jpg","png");
$vExt = explode(".", $nomeOrig);
$extensao = $vExt[count($vExt)-1];
$extensao = strtolower($extensao);//minuscula


if(!in_array($extensao, $tiposPermitidos)){
    echo "Arquivo Invalido";
}else{
    $origem = $nomeTemp;
    $destino = "../../files/" . $nomeOrig;
    
    $result = move_uploaded_file($origem, $destino);
    
    $tmpArquivo = new Arquivos();
    $tmpArquivo->setNome($nomeOrig);
    $tmpArquivo->setData(date('Y-m-d'));
    $tmpArquivo->setCodigoTarefa($tar);
    
    TarefasDAO::cadastrarArquivo($tmpArquivo);    

    if($result){
        echo "<script>alert('Arquivo copiado.');</script>";
    }else{
        echo "<script>alert('Erro na transferencia');</script>";
    }
    
    echo "<script>location.href='DetalhesTarefaUI.php?proj=$proj&cod=$tar';</script>";
}





