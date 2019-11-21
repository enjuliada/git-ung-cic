<?php
require_once "../DAO/ProjetosDAO.php";
require_once "../DAO/TarefasDAO.php";
require_once "../Model/Tarefas.php";
$itens = TarefasDAO::listarTarefas(0, $proj);
?>
      
                   
            <div class="table-responsive border">
                
                <table class="table table-sm table-striped">
                    <thead class="bg-light"> <!-- cabeçalho da tabela -->
                        <th>Nome da Tarefa</th>
                        <th>Data Registrada</th>
                        <th>Responsável</th>
                        <th>Status</th>                        
                        <th>Ação</th>                        
                    </thead> 
                    
                    <tbody>                        
                        <?php 
                        if($itens != null){
                        
                        for($i=0; $i<count($itens); $i++) {  ?>
                        
                        <tr>
                            <td>
                                <a href="DetalhesTarefaUI.php?proj=<?=$proj;?>&cod=<?=$itens[$i]->getCodigo();?>">
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
                            <td align="center">
                                <a href="../Control/TarefasControl.php?acao=5&proj=<?=$proj?>&tar=<?=$itens[$i]->getCodigo();?>">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>                                
                            </td>
                            
                        </tr>
                        
                        <?php  } 
                        }
                        ?>
                        
                    </tbody>
                    
                </table>                
                
            </div>
            