<?php
$rsClientes = listarRegistros($vConn, "Customers");
$rsFuncionarios = listarRegistros($vConn, "Employees");
?>

<form action="CadastroDados.php" method="post">
    <div class="row LinhaForm">
        <div class="col-lg-6">
            <label>Cliente: </label>
            
            <select name="HTML_cliente" class="form-control">
                <?php
                    while($tblClientes = mysqli_fetch_array($rsClientes)){
                ?>
                <option><?=$tblClientes[0] . " - " . $tblClientes[1]?></option>
                
                <?php
                    }
                ?>
            </select>
            
        </div>
        <div class="col-lg-6">
            <label>Funcionário: </label>
            
            <select name="HTML_funcionario" class="form-control">
                <?php
                    while($tblFuncionarios = mysqli_fetch_array($rsFuncionarios)){
                ?>
                <option><?=$tblFuncionarios[2] . " " . $tblFuncionarios[1] ?></option>
                
                <?php
                    }
                ?>
            </select>       
            
        </div>  
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-4">
            <label>Data da Venda: </label>
            <input type="date" name="HTML_dataVenda" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>Data Requerida: </label>
            <input type="date" name="HTML_dataRequerida" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>Data de Envio: </label>
            <input type="date" name="HTML_dataEnvio" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-4">
            <label>Código de Envio: </label>
            <input type="number" name="HTML_codigoEnvio" class="form-control" maxlength="11">
        </div>
        <div class="col-lg-4">
            <label>Frete: </label>
            <input type="number" name="HTML_frete" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm mt-5">
        <div class="col-lg-12">
            <p class="text-center font-weight-bold">Dados da Transportadora</p>       
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <label>Nome: </label>
            <input type="text" name="HTML_nome" class="form-control" maxlength="40">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-8">
            <label>Endereço: </label>
            <input type="text" name="HTML_endereco" class="form-control" maxlength="60">
        </div>
        <div class="col-lg-4">
            <label>Cidade: </label>
            <input type="text" name="HTML_cidade" class="form-control" maxlength="15">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-4">
            <label>Estado: </label>
            <input type="text" name="HTML_estado" class="form-control" maxlength="15">
        </div>
        <div class="col-lg-4">
            <label>País: </label>
            <input type="text" name="HTML_pais" class="form-control" maxlength="15">
        </div>
        <div class="col-lg-4">
            <label>CEP: </label>
            <input type="text" name="HTML_cep" class="form-control" maxlength="10">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-12">
                <input type="hidden" name="tabela" value="orders">
                <button type="submit" class="btn btn-dark float-right">Cadastrar Venda</button>            
        </div>
    </div>
    
</form>