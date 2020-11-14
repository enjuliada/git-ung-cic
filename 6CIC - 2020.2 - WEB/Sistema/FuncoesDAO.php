<?php

include "Conexao.php";

function gerarIdVenda($vConn){
    $sqlId = "Select OrderId from orders order by orderid desc limit 1";
    $rsId = mysqli_query($vConn, $sqlId) or die(mysqli_error($vConn));
    
    $tblId = mysqli_fetch_array($rsId);
    
    $novoId = $tblId['OrderId'];
    return $novoId + 1;
    
}


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

/*----------------------------------------------------------------------------*/

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

/*----------------------------------------------------------------------------*/

function consultarCliente($vConn, $Id){
    $sqlCliente = "Select * from customers where CustomerID like '$Id'";    
    $rsCliente = mysqli_query($vConn, $sqlCliente) or die(mysqli_error($vConn));
    
    return $rsCliente;
}

/*----------------------------------------------------------------------------*/

function consultarPorFornecedor($vConn, $Id){
    $sqlFornecedor = "Select * from suppliers where SupplierID like '$Id'";    
    $rsFornecedor = mysqli_query($vConn, $sqlFornecedor) or die(mysqli_error($vConn));
    
    return $rsFornecedor;
}

/*----------------------------------------------------------------------------*/

function consultarPorFuncionario($vConn, $Id){
    $sqlFuncionario = "Select * from employees where EmployeeID like '$Id'";    
    $rsFuncionario = mysqli_query($vConn, $sqlFuncionario) or die(mysqli_error($vConn));
    
    return $rsFuncionario;
}

/*----------------------------------------------------------------------------*/

function consultarPorProduto($vConn, $Id){
    $sqlProduto = "Select * from products P, categories C where P.ProductID like '$Id' and P.CategoryId = C.categoryID";    
    $rsProduto = mysqli_query($vConn, $sqlProduto) or die(mysqli_error($vConn));
    
    return $rsProduto;
}

/*----------------------------------------------------------------------------*/
function consultarVenda($vConn, $Id){
    $sqlCliente = "Select * from Orders O, Shippers S, Employees E where O.OrderID = $Id and O.EmployeeID = E.EmployeeID and O.ShipVia = S.ShipperID";    
    $rsCliente = mysqli_query($vConn, $sqlCliente) or die(mysqli_error($vConn));
    
    return $rsCliente;
}

/*----------------------------------------------------------------------------*/

function listarVendas($vConn, $id){
    $sqlVendas = "Select * from orders O, employees E, Shippers S where O.CustomerId like '$id' and O.EmployeeID = E.EmployeeID and O.ShipVia = S.ShipperID";    
    $rsVendas = mysqli_query($vConn, $sqlVendas) or die(mysqli_error($vConn));
    
    return $rsVendas;
    
}
/*----------------------------------------------------------------------------*/

function listarVendasFuncionario($vConn, $id){
    $sqlVendas = "Select * from orders O, employees E, Shippers S where O.EmployeeID like '$id' and O.EmployeeID = E.EmployeeID and O.ShipVia = S.ShipperID";    
    $rsVendas = mysqli_query($vConn, $sqlVendas) or die(mysqli_error($vConn));
    
    return $rsVendas;
    
}

/*----------------------------------------------------------------------------*/
function listarProdutosFornecedor($vConn, $id){
    $sqlVendas = "Select * from products where SupplierID like '$id'";    
    $rsVendas = mysqli_query($vConn, $sqlVendas) or die(mysqli_error($vConn));
    
    return $rsVendas;
    
}

/*----------------------------------------------------------------------------*/
function listarFornecedoresProduto($vConn, $id){
    $sqlVendas = "SELECT * FROM suppliers  INNER JOIN products ON products.SupplierID = suppliers.SupplierID WHERE ProductID = $id";    
    $rsVendas = mysqli_query($vConn, $sqlVendas) or die(mysqli_error($vConn));
    
    return $rsVendas;
    
}
/*----------------------------------------------------------------------------*/

function calcularCompra($vConn, $idVenda){
    $sqlTotal = "SELECT sum(P.UnitPrice * OD.Quantity) as total FROM Orderdetails OD, Products P,";
    $sqlTotal .= "Orders O where OD.orderid = O.orderid and O.orderid = $idVenda and OD.ProductId = P.ProductId";
    $rsTotal = mysqli_query($vConn, $sqlTotal) or die(mysqli_error($vConn));
    
    $tblTotal = mysqli_fetch_array($rsTotal);
    
    return $tblTotal['total'];
    
}
/*----------------------------------------------------------------------------*/

function listarItens($vConn, $idVenda){
    $sqlItens = "Select P.productID, P.ProductName, C.categoryName, OD.quantity, P.UnitPrice, (OD.Quantity * P.UnitPrice) as parcial
                from Orders O, orderdetails OD, products P, categories C where 
                O.orderid = $idVenda and O.OrderID = OD.OrderID and 
                OD.ProductID = P.ProductID and P.CategoryID = C.CategoryID";
    
    $rsItens = mysqli_query($vConn, $sqlItens) or die(mysqli_error($vConn));
    
    return $rsItens;
}

/*----------------------------------------------------------------------------*/
function corrigirData($tmpData){
    
    if($tmpData == NULL) {
        return "";
    }else{
 
        $vData = explode("-", $tmpData);
        $vDia = explode(" ", $vData[2]);
    
        return $vDia[0] . "/" . $vData[1] . "/" . $vData[0];  
    }
}

/*----------------------------------------------------------------------------*/

function registrarItens($vConn, $sessItens, $idPed){
    
    $vItens = explode("#",$sessItens);
    
    for($i=0;$i<count($vItens)-1;$i++){
        $dadosItem = explode("-", $vItens[$i]);
        $idProd = $dadosItem[0];
        $qProd = $dadosItem[1];
        
        $sqlCadItem = "Insert into orderdetails(orderId, ProductId, quantity) values(";
        $sqlCadItem .= "$idPed,$idProd,$qProd)";
        
        mysqli_query($vConn, $sqlCadItem) or die(mysqli_error($vConn));
        
        //echo $sqlCadItem . "<br><br>";
    }
    
}
?>

