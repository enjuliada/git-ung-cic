<?php
$rsLista = listarRegistros($vConn, $tabela);
$numCampos=  mysqli_num_fields($rsLista);
$rsCampos = listarCampos($vConn, $tabela);

while($campos = mysqli_fetch_array($rsCampos)){
    $nomeCampos[] = $campos[0];
}

?>

<h5><?=strtoupper($tabela);?></h5>
<hr>
<a href="?idPg=<?=$idPg + 2;?>">
    <i class="fa fa-md fa-plus-square"></i>
    Adicionar Novo
</a>
<table class="table-sm table-striped">

    <thead class="table-dark">
        <tr>
        <?php 
        
        $cont = 0;
        foreach($nomeCampos as $valor){ 
            if($cont < 10){
        ?>
            <th><?=$valor;?></th>
        <?php 
            } //fechando if
        $cont++;
        } //fechando for
        ?>
        </tr>
    </thead>
    
    <tbody>
        <?php
        while ($dadosLista = mysqli_fetch_array($rsLista)) {
        ?>   
        <tr>
            <?php 
            for($i=0; $i<$numCampos; $i++){ 
                if ($i < 10){
                    if($i <= 1){ //duas primeiras col (0 e 1)
            ?>
                <td>
                    <a href="?idPg=11&idCli=<?=$dadosLista[0];?>" class="LinkDados">
                        <?=$dadosLista[$i];?>
                    </a>
                </td>
            
            <?php } else { ?>
            
            <td><font class="TextoDados"><?=$dadosLista[$i];?></font></td>            
            
            <?php
                    } //fechando if else interno
                } //fechando if externo
            } //fechando for
            ?>
            
        </tr>

        <?php
        }//fechando while
        ?>
    </tbody>
    
</table>


