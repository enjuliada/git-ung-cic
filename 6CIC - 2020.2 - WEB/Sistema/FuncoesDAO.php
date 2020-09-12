<?php

include "Conexao.php";

function listarRegistros($vConn, $tabela){
    
    $sqlLista = "Select * from $tabela";
    $rsLista = mysqli_query($vConn, $sqlLista) or die(mysqli_error($vConn));
    
    return $rsLista; //retornando rsult com os dados do banco
}

/*----------------------------------------------------------------------------*/

function listarCampos($vConn, $tabela){
    $sqlCampos = "Show columns from $tabela";
    $rsCampos = mysqli_query($vConn, $sqlCampos) or die(mysqli_error($vConn));
    
    return $rsCampos; //retornando rsult com os dados do banco    
}

function listarDadosHome($vConn, $id){
 
if($id == 10)
        $sqlDados = "Select CustomerID, CompanyName, Country from Customers limit 5";
if($id == 20)
        $sqlDados = "Select EmployeeID, FirstName, LastName, Country from Employees limit 5";
if($id == 30)
        $sqlDados = "Select SupplierID, CompanyName, City, Country from Suppliers limit 5";
if($id == 40)
        $sqlDados = "Select ShipperID, CompanyName, Phone from Shippers limit 5";
if($id == 50)
        $sqlDados = "Select ProductId, ProductName, UnitPrice from Products limit 5";
if($id == 60)
        $sqlDados = "Select OrderId, OrderDate, CustomerID, ShipCity from Orders limit 5";
    
$rsDados = mysqli_query($vConn, $sqlDados) or die(mysqli_error($vConn));

return $rsDados;
    
}

?>