<?php

include "Conexao.php";
include "FuncoesDAO.php";

$dadosForm = $_POST['data'];
$qtdeCamposForm = count($dadosForm);

$tabela = $_POST['tabela'];
$campos = "";
$rsCampos = listarCampos($vConn, $tabela);
$qtdeCamposBD = mysqli_num_rows($rsCampos);

//montando campos na string SQL
$cont=1;
if($tabela == "employees"){
    while($tblCampos = mysqli_fetch_array($rsCampos)){
        if($cont < 13)
            $campos .= $tblCampos[0] . ", ";
        else if($cont == 13)
            $campos .= $tblCampos[0]; 
        
        $cont++;        
    }
    
}else{
    while($tblCampos = mysqli_fetch_array($rsCampos)){
    
        if($cont < $qtdeCamposBD)
            $campos .= $tblCampos[0] . ", ";
        else
        $campos .= $tblCampos[0]; 
        
        $cont++;
    }
}

//montando valores na String SQL
$valores = "";
for($i=0; $i<count($dadosForm);$i++){
   if($i < count($dadosForm) - 1) 
    $valores .= "'" . $dadosForm[$i] . "', ";
   else
    $valores .= "'" . $dadosForm[$i]  . "'";
}

$sqlCadastra = "Insert into $tabela($campos)values($valores)";

mysqli_query($vConn, $sqlCadastra) or die(mysqli_error($vConn));  

echo "Registro Cadastrado.";

?>
