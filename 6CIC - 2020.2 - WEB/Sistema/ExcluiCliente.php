<?php
$idCli = $_GET['id'];
$conf = $_GET['conf'];

if($conf == 0){
?>

<h5> Deseja Excluir o Cliente <?=$idCli?> ? </h5>

    <a href="ExcluiCliente.php?conf=1&id=<?=$idCli;?>" class="btn btn-success">SIM</a>
    <a href="?idPg=10" class="btn btn-danger">NÃO</a>


<?php
}else{
    include "Conexao.php";
    
    //delete
    $sqlExclui = "Delete from customers where customerID like '$idCli'";
    
    mysqli_query($vConn, $sqlExclui) or die(mysqli_error($vConn));
    echo "<script>alert('Cliente Excluído');</script>";
    echo "<script>location.href='Painel.php?idPg=10';</script>";
}
?>