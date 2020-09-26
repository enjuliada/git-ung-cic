<?php

include "Conexao.php";
include "FuncoesDAO.php";

$dadosForm = array($_POST);
$qtdeCamposForm = count($dadosForm);

$tabela = $_POST['tabela'];
$campos = "";
$rsCampos = listarCampos($vConn, $tabela);
$qtdeCamposBD = mysqli_num_rows($rsCampos);

$cont=1;
while($tblCampos = mysqli_fetch_array($rsCampos)){
    
        if($cont < $qtdeCamposBD)
            $campos .= $tblCampos[0] . ",";
        else
        $campos .= $tblCampos[0];        
    $cont++;
}

echo "Insert into $tabela($campos)values()";  

?>
