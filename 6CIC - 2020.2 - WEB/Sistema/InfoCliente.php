<?php
$idCli = $_GET['idReg']; //objeto GET acessa o valor de uma variavel passada via URL

$rsCliente = consultarCliente($vConn, $idCli); //chamando metodo que retorna dados do cliente selecionado
$rsVenda = listarVendas($vConn, $idCli); //chamando metodo que retorna dados do cliente selecionado

$tblCliente = mysqli_fetch_array($rsCliente); //abrindo o resultset para exibição dos dados

$totalGasto = 0;
?>

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
            <div class="col-lg-6">
                Representante: <?= $tblCliente['ContactName'] ?><br>
                Cargo: <?= $tblCliente['ContactTitle'] ?><br>
                Telefone: <?= $tblCliente['Phone'] ?><br>
                E-mail: <?= $tblCliente['Fax'] ?><br>
            </div>

            <div class="col-lg-6">
                Endereço: <?= $tblCliente['Address'] ?><br>
                Cidade: <?= $tblCliente['City'] ?><br>
                País: <?= $tblCliente['Country'] ?><br>
                CEP: <?= $tblCliente['PostalCode'] ?><br>

            </div>
        </div>
    </div>
</div>

        <hr>
        
        <table class="table table-sm table-striped">
            <thead>
                    <th>Cód. Venda</th>
                    <th>Data</th>
                    <th>Entrega</th>
                    <th>Valor Total</th>
                    <th>Frete</th>
                    <th>Transportadora</th>
                    <th>Vendedor</th>
                    
            </thead>
            <tbody>                
                <?php
                while ($tblVenda = mysqli_fetch_array($rsVenda)) {
                    $totalGasto += calcularCompra($vConn, $tblVenda['OrderID']);
                    ?>
                    <tr>
                        <td><?= $tblVenda['OrderID'] ?></td>            
                        <td><?= corrigirData($tblVenda['OrderDate']) ?></td>
                        <td><?= corrigirData($tblVenda['ShippedDate']) ?></td>
                        <td>U$ <?=number_format(calcularCompra($vConn, $tblVenda['OrderID']),2) ?></td>
                        <td>U$ <?= number_format($tblVenda['Freight'], 2) ?></td>
                        <td><?= $tblVenda['CompanyName'] ?></td>
                        <td><?= $tblVenda['FirstName'] . " " . $tblVenda['LastName'] ?></td>

                    </tr>

                <?php } ?>
            </tbody>
        </table>
        
        <hr>
        <div class="float-right">
            <h5>Total em Compras: R$ <?=number_format($totalGasto,2);?>
        </div>
