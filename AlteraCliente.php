<?php
include "Conexao.php";
include "FuncoesDAO.php";

$idCli = $_POST['id'];
$tabela = $_POST['tabela'];
$dadosForm = $_POST['data'];
$tmpCampos = listarCampos($vConn, $tabela);

$sqlAltera = "Update " . $tabela . " set ";

$i = 0;
while($camposBD = mysqli_fetch_array($tmpCampos)){
    if($i<count($dadosForm)-1){
        $sqlAltera .= $camposBD[0] . " = " . "'$dadosForm[$i]'" .  ", ";
    }else {
        $sqlAltera .= $camposBD[0] . " = " . "'$dadosForm[$i]'";
    }    
    $i++;
}//fechando while

$sqlAltera .= " where CustomerID like '" . $idCli . "'";

//echo $sqlAltera;

mysqli_query($vConn, $sqlAltera) or die (mysqli_error($vConn));

echo "<script>alert('Cliente Alterado!');</script>";
echo "<script>location.href='Painel.php?idPg=11&idReg=$idCli';</script>";

?>