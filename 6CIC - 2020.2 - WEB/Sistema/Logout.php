<?php
    session_start();
    
    $_SESSION['nome'] = NULL;
    $_SESSION['imagem'] = NULL;
    $_SESSION['horaLogin'] = NULL;
    $_SESSION['permissao'] = 0;    
    $_SESSION['statusLogin'] = 0;   
    
    session_destroy();
    
    echo "<script>location.href='index.php';</script>";

?>

