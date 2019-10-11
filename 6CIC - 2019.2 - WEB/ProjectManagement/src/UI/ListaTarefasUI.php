<?php
require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";
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
                    </thead> 
                    
                    <tbody>                        
                        <?php 
                        if($itens != null){
                        
                        for($i=0; $i<count($itens); $i++) {  ?>
                        
                        <tr>
                            <td>
                                <a href="DetalhesTarefaUI.php?proj=<?=$proj;?>&tar=<?=$itens[$i]->getCodigo();?>">
                                    <?=$itens[$i]->getNome();?>
                                </a>
                            </td>
                                                        
                            <td><?=ProjetosDAO::corrigirData($itens[$i]->getData());?></td>
                            
                                <?php
                                    $user = $itens[$i]->getEmailUsuario();
                                    $tmpUsuario = UsuariosDAO::consultarUsuario($user);
                                    $nome = $tmpUsuario->getNome();
                                ?>
                            <td><?=$nome;?></td>
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
            