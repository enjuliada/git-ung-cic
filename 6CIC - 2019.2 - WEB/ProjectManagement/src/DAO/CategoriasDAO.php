<?php
require_once "ConexaoDAO.php";
require_once "../Model/Categorias.php";

class CategoriasDAO {

    public static function listarCategorias(){
        $vConn = ConexaoDAO::abrirConexao();
        
        $sqlCat = "Select * from categorias";
        $rsCat = mysqli_query($vConn,$sqlCat)
                 or die(mysqli_error($vConn));        
        
        //convertendo RS em uma Matriz(dados) e fazendo
        //a leitura a partir de um WHILE
        $itens = new ArrayObject();
        
        while($dados = mysqli_fetch_array($rsCat)){
            //instanciando e preenchendo objeto
            $tmpCategoria = new Categorias;
            $tmpCategoria->setCodigoCategoria($dados['codigo_CATEGORIA']);
            $tmpCategoria->setNomeCategoria($dados['nome_CATEGORIA']);
            
            //add categoria atual na Array
            $itens->append($tmpCategoria);
            
        }//fechando while
        
        return $itens;
        
    }
    
}

?>
