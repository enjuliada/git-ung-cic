<?php
$idCli = $_GET['idReg']; //objeto GET acessa o valor de uma variavel passada via URL

$rsCliente = consultarCliente($vConn, $idCli); //chamando metodo que retorna dados do cliente selecionado
$rsVenda = listarVendas($vConn, $idCli); //chamando metodo que retorna dados do cliente selecionado

$tblCliente = mysqli_fetch_array($rsCliente); //abrindo o resultset para exibição dos dados

$totalGasto = 0;
?>
<img src="img/bcustomers.jpg" class="img-fluid" style="margin-top:15px;">
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
<center>
    <u><h5 style="margin-top:15px;">Compras Efetuadas</h5></u>
</center>
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
<?php
$linhaItem = 1;
while ($tblVenda = mysqli_fetch_array($rsVenda)) {
    $idVenda = $tblVenda['OrderID'];
    $idFunc = $tblVenda['EmployeeID'];
    $rsItens = listarItens($vConn, $idVenda);

    $totalGasto += calcularCompra($vConn, $idVenda);
    ?>
    <div class="row border-top" style="padding-top:5px;padding-bottom:5px;">
        <div class="col-lg-2 TextoDados">
            <button class="BotaoDetalhes" onclick="mostrarItens(<?=$linhaItem?>);"><?= $idVenda ?></button>
        </div>            
        <div class="col-lg-1 TextoDados"><?= corrigirData($tblVenda['OrderDate']) ?></div>
        <div class="col-lg-1 TextoDados"><?= corrigirData($tblVenda['ShippedDate']) ?></div>
        <div class="col-lg-2 TextoDados">U$ <?= number_format(calcularCompra($vConn, $tblVenda['OrderID']), 2) ?></div>
        <div class="col-lg-2 TextoDados">U$ <?= number_format($tblVenda['Freight'], 2) ?></div>
        <div class="col-lg-2 TextoDados"><?= $tblVenda['CompanyName'] ?></div>
        <div class="col-lg-2 TextoDados">
            <a href="?idPg=21&idReg=<?=$idFunc;?>">
            <?= $tblVenda['FirstName'] . " " . $tblVenda['LastName'] ?></div>
            </a>

    </div>

        <div id="<?= $linhaItem ?>" style="display:none;"> 
        <div class="row" style="background-color:rgba(99,184,255,0.5);">
            <div class="col-lg-2 TopoTabela">Cód. Prod.</div>
            <div class="col-lg-2 TopoTabela">Nome Produto</div>
            <div class="col-lg-2 TopoTabela">Categoria</div>
            <div class="col-lg-2 TopoTabela">Quantidade</div>
            <div class="col-lg-2 TopoTabela">Valor Unit.</div>
            <div class="col-lg-2 TopoTabela">Valor Parc.</div>
        </div> 
        <?php while ($tblItens = mysqli_fetch_array($rsItens)) { ?>
            <div class="row" style="background-color:rgba(176,225,255,0.5);">
                <div class="col-lg-2 TextoDados"><?= $tblItens['productID'] ?></div>
                <div class="col-lg-2 TextoDados"><?= $tblItens['ProductName'] ?></div>
                <div class="col-lg-2 TextoDados"><?= $tblItens['categoryName'] ?></div>
                <div class="col-lg-2 TextoDados"><?= $tblItens['quantity'] ?></div>
                <div class="col-lg-2 TextoDados">U$ <?= number_format($tblItens['UnitPrice'],2) ?></div>
                <div class="col-lg-2 TextoDados">U$ <?= number_format($tblItens['parcial'],2) ?></div>
            </div> 

        <?php } ?>
    </div>
    <?php
    $linhaItem++;
}
?>


<hr>
<div class="float-right">
    <h5>Total em Compras: R$ <?= number_format($totalGasto, 2); ?>
</div>
