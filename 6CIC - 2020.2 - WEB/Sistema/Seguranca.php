<?php

if(!isset($_SESSION['permissao'])){
     echo "<script>location.href='Logout.php';</script>";
}


if($_SESSION['statusLogin'] == 0){
     echo "<script>location.href='Logout.php';</script>";
}

?>