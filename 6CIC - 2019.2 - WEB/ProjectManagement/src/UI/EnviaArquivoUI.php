<?php

$nomeOrig = $_FILES['HTML_arquivo']['name'];
$nomeTemp =$_FILES['HTML_arquivo']['tmp_name'];
$tamanho = $_FILES['HTML_arquivo']['size']/1024;
$tipo = $_FILES['HTML_arquivo']['type'];

$tiposPermitidos = array("pdf","doc","png","jpg","txt","xls","ppt");

$vArquivo = explode(".",$nomeOrig);
$extensao = $vArquivo[count($vArquivo)-1];
$extensao = strtolower($extensao);

if(!in_array($extensao, $tiposPermitidos)){
    echo "Não aceito";
}else{
  $origem = $nomeTemp;
  $destino = "../../files/". $nomeOrig;
  
  $result = move_uploaded_file($origem, $destino);
  
if($result) echo "Arquivo transferido";
else echo "Falha na transferência";


} //fechando else




?>