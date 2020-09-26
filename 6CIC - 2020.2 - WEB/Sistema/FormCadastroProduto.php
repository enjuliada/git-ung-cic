<?php
$rsCat = listarRegistros($vConn, "Categories");
$rsForn = listarRegistros($vConn, "Suppliers");
?>

<form action="CadastroDados.php" method="post">
    <div class="row LinhaForm">
        <div class="col-lg-6">
            <label>Nome do Produto</label>
            <input type="text" name="HTML_produto" class="form-control">
        </div>  
        <div class="col-lg-3">
            <label>Quantidade em Estoque</label>
            <input type="text" name="HTML_quantidade" class="form-control">
        </div>  
        <div class="col-lg-3">
            <label>Formato do Pcte.</label>
            <input type="text" name="HTML_formato" class="form-control">
        </div>  
    </div>
    
    <div class="row LinhaForm">
        <div class="col-lg-5">
            <label>Categoria</label>
            
            <select name="HTML_categoria" class="form-control">
                <?php
                    while($tblCat = mysqli_fetch_array($rsCat)){
                ?>
                <option><?=$tblCat[1] . " - " . $tblCat[2]?></option>
                
                <?php
                    }
                ?>
            </select>            
            
        </div>  
        <div class="col-lg-5">
            <label>Fornecedor</label>
            
            <select name="HTML_fornecedor" class="form-control">
                <?php
                    while($tblForn = mysqli_fetch_array($rsForn)){
                ?>
                <option><?=$tblForn[1]?></option>
                
                <?php
                    }
                ?>
            </select>       
            
        </div>  
        <div class="col-lg-2">
            <label>Valor Unitário</label>
            <input type="text" name="HTML_valor" class="form-control">
        </div>  
    </div>
    
    
    <div class="row LinhaForm">
        <div class="col-lg-12">
                <input type="hidden" name="tabela" value="products">
                <button type="submit" class="btn btn-dark float-right">Cadastrar Produto</button>            
        </div>
    </div>
    
</form>