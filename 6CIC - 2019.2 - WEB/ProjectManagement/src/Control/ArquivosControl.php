<?php

require_once "../Model/Arquivos.php";
require_once "../DAO/TarefasDAO.php";

$tmpArquivo = new Arquivos();

$codTar = $_POST['codTarefa'];

$nomeArquivo = $_FILES['HTML_arquivo']['name'];
$nomeTemp = $_FILES['HTML_arquivo']['tmp_name'];

$tiposPermitidos = array("png", "jpg", "doc", "docx", "ppt", "pptx", "pdf", "txt");

$vArquivo = explode(".", $nomeArquivo);
$ext = $vArquivo[count($vArquivo) - 1];

if (in_array(strtolower($ext), $tiposPermitidos)) {
    echo "aceito";
} else {
    echo "nao aceito";
}
$hoje=date("Y-m-d");

$tmpArquivo->setNome($nomeArquivo);
$tmpArquivo->setData($hoje);
$tmpArquivo->setCodigoTarefa($codTar);

TarefasDAO::cadastrarArquivo($tmpArquivo);



//$status = move_uploaded_file($nomeTemp, "../../files/".$nomeArquivo);
//echo $codTar ."<br>";
//echo $status;
?>
