<?php
require_once "../DAO/ProjetosDAO.php";
require_once "../Model/Projetos.php";
session_start();

$email = $_SESSION['email'];
$itens = ProjetosDAO::listarProjetos(1, $email,"");

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body>
      
        <div class="container">
            
            <div class="table-responsive border" style="margin-top:70px;">
                
                <table class="table table-striped">
                    <thead class="bg-primary text-white"> <!-- cabeçalho da tabela -->
                        <th>Nome do Projeto</th>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Categoria</th>
                        <th>Tarefas</th>
                    </thead> 
                    
                    <tbody>
                        
                        <?php 
                        if($itens != null){
                        
                        for($i=0; $i<count($itens); $i++) {  ?>
                        
                        <tr>
                            <td>
                                <a href="DetalhesProjetoUI.php?cod=<?=$itens[$i]->getCodigo();?>">
                                    <?=$itens[$i]->getNome();?>
                                </a>
                            </td>
                                                        
                            <td><?=ProjetosDAO::corrigirData($itens[$i]->getInicio());?></td>
                            <td><?=ProjetosDAO::corrigirData($itens[$i]->getFim());?></td>
                            
                            <td><?=$itens[$i]->getNomeCategoria();?></td>
                            <td></td>
                        </tr>
                        
                        <?php  } 
                        }
                        ?>
                        
                    </tbody>
                    
                </table>                
                
            </div>
            
            
        </div>
        
    </body>

    
</html>