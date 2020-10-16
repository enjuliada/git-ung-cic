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
            if($cont < 13){
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
                if ($i < 13){
                    if($i <= 1){ //duas primeiras col (0 e 1)
                        
                        
                        $cor="#000000";
                        
                        if($idPg==10){
                            $rsVendas = listarVendas($vConn, $dadosLista[0]);
                            
                            if(mysqli_num_rows($rsVendas) == 0) $cor = "#FD9D90";
                            else $cor = "#3D76E0";
                        }
            ?>
                <td>
                    <a href="?idPg=<?=$idPg + 1;?>&idReg=<?=$dadosLista[0];?>" class="LinkDados">
                        <font color="<?=$cor?>"><?=$dadosLista[$i];?>
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


