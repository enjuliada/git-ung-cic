<?php

require_once "../DAO/TarefasDAO.php";
require_once "../Model/Arquivos.php";

$proj = $_POST['proj'];
$cod = $_POST['cod'];

$nomeOrig = $_FILES['HTML_arquivo']['name'];
$nomeTemp =$_FILES['HTML_arquivo']['tmp_name'];
$tamanho = $_FILES['HTML_arquivo']['size']/1024;
$tipo = $_FILES['HTML_arquivo']['type'];

$tiposPermitidos = array("pdf","doc","png","jpg","txt","xls","ppt");

$vArquivo = explode(".",$nomeOrig);
$extensao = $vArquivo[count($vArquivo)-1];
$extensao = strtolower($extensao);

if(!in_array($extensao, $tiposPermitidos)){
    echo "<script>alert('Formato de arquivo inválido');</script>";
}else{
  $origem = $nomeTemp;
  $destino = "../../files/". $nomeOrig;
  
  $result = move_uploaded_file($origem, $destino);
  //chamada do cadastro
  
  $tmpArquivo = new Arquivos();
  $tmpArquivo->setNome($nomeOrig);
  $tmpArquivo->setData(date('Y-m-d'));
  $tmpArquivo->setCodigoTarefa($cod);
  
  TarefasDAO::cadastrarArquivo($tmpArquivo);
  
if($result) 
    echo "<script>alert('Arquivo Transferido');</script>";    
else 
    echo "<script>alert('Falha na transferência.');</script>";

//redirecionando
echo "<script>location.href='DetalhesTarefaUI.php?proj=$proj&cod=$cod';</script>";

} //fechando else




?>