<?php
$rsCat = listarRegistros($vConn, "Categories");
$rsForn = listarRegistros($vConn, "Suppliers");
?>

<form action="CadastroDados.php" method="post">
    <div class="row LinhaForm">
        <div class="col-lg-6">
            <label>Nome do Produto</label>
            <input type="text" name="data[1]" class="form-control">
        </div>  
        <div class="col-lg-3">
            <label>Quantidade em Estoque</label>
            <input type="text" name="data[6]" class="form-control">
        </div>  
        <div class="col-lg-3">
            <label>Formato do Pcte.</label>
            <input type="text" name="data[4]" class="form-control">
        </div>  
    </div>
    
    <div class="row LinhaForm">
        <div class="col-lg-5">
            <label>Categoria</label>
            
            <select name="data[3]" class="form-control">
                <?php
                    while($tblCat = mysqli_fetch_array($rsCat)){
                ?>
                <option value="<?=$tblCat[0]?>"><?=$tblCat[1] . " - " . $tblCat[2]?></option>
                
                <?php
                    }
                ?>
            </select>            
            
        </div>  
        <div class="col-lg-5">
            <label>Fornecedor</label>
            
            <select name="data[2]" class="form-control">
                <?php
                    while($tblForn = mysqli_fetch_array($rsForn)){
                ?>
                <option value="<?=$tblForn[0]?>"><?=$tblForn[1]?></option>
                
                <?php
                    }
                ?>
            </select>       
            
        </div>  
        <div class="col-lg-2">
            <label>Valor Unitário</label>
            <input type="text" name="data[5]" class="form-control">
        </div>  
    </div>
    
    <div class="row LinhaForm">
        <div class="col-lg-4">
            <label>Qtde. Limite</label>
            <input type="number" name="data[7]" class="form-control">
        </div>
        
        <div class="col-lg-4">
            <label>Nivel Revenda</label>
            <input type="number" name="data[8]" class="form-control">
        </div>
        
        <div class="col-lg-4">
            <label>Descontinuado</label>
            <select name="data[9]" class="form-control">
                <option value="1">Não</option>
                <option value="0">Sim</option>
            </select>
        </div>        
    </div>
        
    <div class="row LinhaForm">
        <div class="col-lg-12">
                <input type="hidden" name="data[0]" value="">
                <input type="hidden" name="tabela" value="products">
                <button type="submit" class="btn btn-dark float-right">Cadastrar Produto</button>            
        </div>
    </div>
    
</form>