<?php
$idVenda = $_GET['idReg'];
$rsVenda = consultarVenda($vConn, $idVenda);
$tblVenda = mysqli_fetch_array($rsVenda);

$idCli = $tblVenda['CustomerID'];
$rsCliente = consultarCliente($vConn, $idCli);
$tblCliente = mysqli_fetch_array($rsCliente);

$idFunc = $tblVenda['EmployeeID'];

$rsItens = listarItens($vConn, $idVenda);
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

<div class="row">
    <div class="col-lg-2 TopoTabela">Cód. Venda</div>
    <div class="col-lg-1 TopoTabela">Data</div>
    <div class="col-lg-1 TopoTabela">Entrega</div>
    <div class="col-lg-2 TopoTabela">Valor Total</div>
    <div class="col-lg-2 TopoTabela">Frete</div>
    <div class="col-lg-2 TopoTabela">Transportadora</div>
    <div class="col-lg-2 TopoTabela">Vendedor</div>
</div>

<div class="row border-top" style="padding-top:5px;padding-bottom:5px;">
    <div class="col-lg-2">
<?= $idVenda ?>
    </div>            
    <div class="col-lg-1 "><?= corrigirData($tblVenda['OrderDate']) ?></div>
    <div class="col-lg-1 "><?= corrigirData($tblVenda['ShippedDate']) ?></div>
    <div class="col-lg-2 ">U$ <?= number_format(calcularCompra($vConn, $tblVenda['OrderID']), 2) ?></div>
    <div class="col-lg-2 ">U$ <?= number_format($tblVenda['Freight'], 2) ?></div>
    <div class="col-lg-2 "><?= $tblVenda['CompanyName'] ?></div>
    <div class="col-lg-2 ">
        <a href="?idPg=21&idReg=<?=$idFunc;?>">
            <?= $tblVenda['FirstName'] . " " . $tblVenda['LastName'] ?>
        </a>
    </div>

</div>

<hr>
<div class="row" style="background-color:rgba(99,184,255,0.5);">
            <div class="col-lg-2">Cód. Prod.</div>
            <div class="col-lg-2">Nome Produto</div>
            <div class="col-lg-2">Categoria</div>
            <div class="col-lg-2">Quantidade</div>
            <div class="col-lg-2">Valor Unit.</div>
            <div class="col-lg-2">Valor Parc.</div>
        </div> 
<?php while ($tblItens = mysqli_fetch_array($rsItens)) { ?>
            <div class="row" style="background-color:rgba(176,225,255,0.5);">
                <div class="col-lg-2"><?= $tblItens['productID'] ?></div>
                <div class="col-lg-2"><?= $tblItens['ProductName'] ?></div>
                <div class="col-lg-2"><?= $tblItens['categoryName'] ?></div>
                <div class="col-lg-2"><?= $tblItens['quantity'] ?></div>
                <div class="col-lg-2">U$ <?= number_format($tblItens['UnitPrice'],2) ?></div>
                <div class="col-lg-2">U$ <?= number_format($tblItens['parcial'],2) ?></div>
            </div> 

        <?php } ?>