<?php

$_SESSION['itens'] = "";

$rsClientes = listarRegistros($vConn, "Customers");
$rsFuncionarios = listarRegistros($vConn, "Employees");
$novoId = gerarIdVenda($vConn);

$idCli = $_GET['idCli']; //objeto GET acessa o valor de uma variavel passada via URL
$rsCliente = consultarCliente($vConn, $idCli); //chamando metodo que retorna dados do cliente selecionado
$tblCliente = mysqli_fetch_array($rsCliente); //abrindo o resultset para exibição dos dados

$rsTransp = listarRegistros($vConn, "Shippers");
$rsProd = listarRegistros($vConn, "Products");


?>

<hr>
<div class="row">
    <div class="col-lg-2">
        <img src="img/user.jpg" class="img-thumbnail">
    </div>
    

    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= $tblCliente['CompanyName'] ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                Representante: <?= $tblCliente['ContactName'] ?><br>
                Telefone: <?= $tblCliente['Phone'] ?><br>
                ID do Pedido: <?= $novoId; ?><br>
                Data do Pedido: <?= corrigirData(date("Y-m-d")); ?><br>
            </div>

            <div class="col-lg-4">
                Endereço: <?= $tblCliente['Address'] ?><br>
                Cidade: <?= $tblCliente['City'] ?><br>
                País: <?= $tblCliente['Country'] ?><br>
                CEP: <?= $tblCliente['PostalCode'] ?><br>

            </div>
           
        </div>
    </div>
</div>

<form action="RegistraVenda.php" method="post">
    <div class="row LinhaForm">
        
        <div class="col-lg-6">
            <label>Funcionário: </label>
            
            <select name="HTML_funcionario" class="form-control">
                <?php
                    while($tblFuncionarios = mysqli_fetch_array($rsFuncionarios)){
                ?>
                <option value="<?=$tblFuncionarios[0];?>"><?=$tblFuncionarios[2] . " " . $tblFuncionarios[1] ?></option>
                
                <?php
                    }
                ?>
            </select>                   
        </div>  
        
        <div class="col-lg-3">
            <label>Data do Pagamento: </label>
            <input type="date" name="HTML_dataRequerida" class="form-control">
        </div>
        <div class="col-lg-3">
            <label>Data de Envio: </label>
            <input type="date" name="HTML_dataEnvio" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-6">
            <label>Transportadora: </label>
            
            <select name="HTML_transportadora" class="form-control">
                <?php
                    while($tblTransp = mysqli_fetch_array($rsTransp)){
                ?>
                <option value="<?=$tblTransp[0];?>"><?=$tblTransp[1]; ?></option>
                
                <?php
                    }
                ?>
            </select>                   
        </div>  
        <div class="col-lg-4">
            <label>Frete: </label>
            <input type="number" name="HTML_frete" class="form-control">
        </div>
        
        <div class="col-lg-2">
            <button type="submit" class="btn btn-primary float-right" style="margin-top:30px; ">Registrar Venda</button>
        </div>
    </div>
</form>
    <hr>
    
    <form action="AdicionarItem.php" method="GET">  
    <div class="row">
        <div class="col-lg-6 border-right">
            <div class="row LinhaForm">
                <div class="col-lg-12">
                    <h4>Selecione o item</h4>
            
                    <select name="HTML_produto" class="form-control">
                <?php
                    while($tblProd = mysqli_fetch_array($rsProd)){
                ?>
                <option value="<?=$tblProd[0];?>"><?=$tblProd[0]?> - <?=$tblProd[1];?> </option>
                
                <?php
                    }
                ?>
            </select>
                </div>
                </div>
            <div class="row LinhaForm">
                <div class="col-lg-6">
                    <label>Valor Unit.: </label>
                    <input type="number" name="HTML_preco" class="form-control">
                </div>
                <div class="col-lg-6">
                    <label>Quantidade: </label>
                    <input type="number" name="HTML_qtde" class="form-control">
                </div>
            </div>
            <div class="row LinhaForm">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success float-right">Adicionar Item</button>
                </div>
            </div>
            
        </div>

       
        
        <div class="col-lg-6">
            <h4>Itens do Pedido</h4>
        </div>
    </div>    
    
</form>