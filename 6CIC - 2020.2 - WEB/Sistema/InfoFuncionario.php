<?php
$id = $_GET['idReg']; //objeto GET acessa o valor de uma variavel passada via URL

$rsFuncionario = consultarPorFuncionario($vConn, $id); //chamando metodo que retorna dados do Funcionario selecionado
$rsVenda = listarVendasFuncionario($vConn, $id); //chamando metodo que retorna dados do Funcionario selecionado

$tblFuncionario = mysqli_fetch_array($rsFuncionario); //abrindo o resultset para exibição dos dados
?>
<img src="img/bemployees.jpg" class="img-fluid" style="margin-top:15px;">
<hr>
<div class="row">
    <div class="col-lg-2">
        <img src="img/user.jpg" class="img-thumbnail">
    </div>

    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= $tblFuncionario['FirstName'] . " " . $tblFuncionario['LastName'] ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                Cargo: <?= $tblFuncionario['Title'] ?><br>
                Salário: <?= $tblFuncionario['Salary'] ?><br>
                Data de Contratação: <?= $tblFuncionario['HireDate'] ?><br>
                Data de Aniversário: <?= $tblFuncionario['BirthDate'] ?><br>
            </div>

            <div class="col-lg-6">
                Telefone: <?= $tblFuncionario['HomePhone'] ?><br>
                Endereço: <?= $tblFuncionario['Address'] ?><br>
                Cidade: <?= $tblFuncionario['City'] ?><br>
                País: <?= $tblFuncionario['Country'] ?><br>

            </div>
        </div>
    </div>
</div>

        <hr>
        <center>
            <u><h5 style="margin-top:15px;">Vendas Realizadas</h5></u>
        </center>
        <hr>
        
       <div class="row">
    <div class="col-lg-2 TopoTabela">Cód. Venda</div>
    <div class="col-lg-1 TopoTabela">Data</div>
    <div class="col-lg-1 TopoTabela">Entrega</div>
    <div class="col-lg-2 TopoTabela">Valor Total</div>
    <div class="col-lg-2 TopoTabela">Frete</div>
    <div class="col-lg-2 TopoTabela">Transportadora</div>
    

</div>
<?php
$linhaItem = 1;
while ($tblVenda = mysqli_fetch_array($rsVenda)) {
    $idVenda = $tblVenda['OrderID'];
    $idFunc = $tblVenda['EmployeeID'];
    $rsItens = listarItens($vConn, $idVenda);

    
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

