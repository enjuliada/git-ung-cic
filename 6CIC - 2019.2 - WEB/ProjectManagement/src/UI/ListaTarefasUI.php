<?php
require_once "../DAO/ProjetosDAO.php";
require_once "../DAO/TarefasDAO.php";
require_once "../Model/Tarefas.php";

$itens = TarefasDAO::listarTarefas(0, $proj);

?>
      
        <div class="container">
            
            <div class="table-responsive border" style="margin-top:70px;">
                
                <table class="table table-striped">
                    <thead class="bg-primary text-white"> <!-- cabeçalho da tabela -->
                        <th>Nome da Tarefa</th>
                        <th>Data Registrada</th>
                        <th>Responsável</th>
                        <th>Status</th>                        
                    </thead> 
                    
                    <tbody>                        
                        <?php 
                        if($itens != null){
                        
                        for($i=0; $i<count($itens); $i++) {  ?>
                        
                        <tr>
                            <td>
                                <a href="DetalhesTarefaUI.php?cod=<?=$itens[$i]->getCodigo();?>">
                                    <?=$itens[$i]->getNome();?>
                                </a>
                            </td>
                                                        
                            <td><?=ProjetosDAO::corrigirData($itens[$i]->getData());?></td>
                                                        
                            <td><?=$itens[$i]->getEmailUsuario();?></td>
                            <td>                                
                                <?php
                                    if($itens[$i]->getStatus() == 0)
                                        echo "Incompleta";
                                    else
                                        echo "Finalizada";
                                ?>                                
                            </td>
                        </tr>
                        
                        <?php  } 
                        }
                        ?>
                        
                    </tbody>
                    
                </table>                
                
            </div>
            
            
        </div>
        