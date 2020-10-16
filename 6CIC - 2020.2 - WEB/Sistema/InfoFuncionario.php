<?php
$id = $_GET['idReg']; //objeto GET acessa o valor de uma variavel passada via URL

$rsFuncionario = consultarPorFuncionario($vConn, $id); //chamando metodo que retorna dados do Funcionario selecionado
$rsVenda = listarVendasFuncionario($vConn, $id); //chamando metodo que retorna dados do Funcionario selecionado

$tblFuncionario = mysqli_fetch_array($rsFuncionario); //abrindo o resultset para exibição dos dados
?>

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
        
        <table class="table table-sm table-striped">
            <thead>
                    <th>Cód. Venda</th>
                    <th>Data</th>
                    <th>Entrega</th>
                    <th>Valor Total</th>
                    <th>Frete</th>
                    <th>Transportadora</th>
                    
            </thead>
            <tbody>                
                <?php
                while ($tblVenda = mysqli_fetch_array($rsVenda)) {
                    ?>
                    <tr>
                        <td><?= $tblVenda['OrderID'] ?></td>            
                        <td><?= corrigirData($tblVenda['OrderDate']) ?></td>
                        <td><?= corrigirData($tblVenda['ShippedDate']) ?></td>
                        <td>U$ <?=number_format(calcularCompra($vConn, $tblVenda['OrderID']),2) ?></td>
                        <td>U$ <?= number_format($tblVenda['Freight'], 2) ?></td>
                        <td><?= $tblVenda['CompanyName'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
