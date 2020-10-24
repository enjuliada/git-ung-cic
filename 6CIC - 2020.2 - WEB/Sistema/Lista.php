<?php
$rsLista = listarRegistros($vConn, $tabela);
$numCampos=  mysqli_num_fields($rsLista);
$rsCampos = listarCampos($vConn, $tabela);

while($campos = mysqli_fetch_array($rsCampos)){
    $nomeCampos[] = $campos[0];
}

?>

<img src="img/b<?=$tabela?>.jpg">
<h5 class="text-center"><?=strtoupper($tabela);?></h5>
<hr>
<a href="?idPg=<?=$idPg + 2;?>&acao=1" class="float-right">
    <i class="fa fa-md fa-plus-square"></i>
    Adicionar Novo
</a>
<br>
<table class="table-sm table-striped" align="center">

    <thead class="table-dark">
        <tr>
        <?php 
        
        $cont = 0;
        foreach($nomeCampos as $valor){ 
            if($cont < 13){
        ?>
            <th class="TopoTabela"><center><?=$valor;?></center></th>
        <?php 
            } //fechando if
        $cont++;
        } //fechando for
        ?>
            <th colspan="2" class="TopoTabela">Ações</th>
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
                        
                        
                        $cor="";
                        
                        if($idPg==10){
                            $rsVendas = listarVendas($vConn, $dadosLista[0]);
                            
                            if(mysqli_num_rows($rsVendas) == 0) $cor = "#FD9D90";
                            else $cor = "";
                        }
            ?>
                <td bgcolor="<?=$cor?>" align="center">
                    <a href="?idPg=<?=$idPg + 1;?>&idReg=<?=$dadosLista[0];?>">
                        <font class="LinkDados"><?=$dadosLista[$i];?>
                    </a>
                </td>
            
            <?php } else { ?>
            
            <td align="center"><font class="TextoDados"><?=$dadosLista[$i];?></font></td>            
            
            <?php
                    } //fechando if else interno
                } //fechando if externo
            } //fechando for
            ?>
            
            <td>
                <a href="?idPg=<?=$idPg + 2?>&acao=2&id=<?=$dadosLista[0]?>">
                    <i class="fa fa-edit fa-sm"></i>
                </a>
            </td>
            <td>
                <a href="?idPg=<?=$idPg + 9?>&conf=0&id=<?=$dadosLista[0]?>">
                    <i class="fa fa-trash fa-sm" style="color:red;"></i>
                </a>
            </td>
            
        </tr>

        <?php
        }//fechando while
        ?>
    </tbody>
    
</table>


