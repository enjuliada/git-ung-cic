<?php

require_once "..\DAO\ConexaoDAO.php";
require_once "..\Model\Categorias.php";

class CategoriasDAO {

    function listarCategorias($tmpConn, $tmpTipo, $tmpCod) {
       if($tmpTipo == 0){
			$rsCategorias = mysqli_query($tmpConn, "Select * from Categories");
	   }else{
        	$rsCategorias = mysqli_query($tmpConn, "Select * from Categories where CategoryID = '$tmpCod'");
	   }
	   
        $itens = new ArrayObject();

        while($tblCategorias = mysqli_fetch_array($rsCategorias)) {
            $objCat = new Categorias();

            $objCat->setCod($tblCategorias['CategoryID']);
            $objCat->setDesc($tblCategorias['Description']);
            $objCat->setNome($tblCategorias['CategoryName']);

            $itens->append($objCat);
        }

        return $itens;
    }

    function addCategoria($tmpConn,$obj) {
        
        $tmpConn->exec("set names utf8");
        
        $nome = $obj->getNome();
        $desc = $obj->getDesc();
        
        $conn->exec("Call inserirCategoria('$nome','$desc')");
        
    }
    
    

}
