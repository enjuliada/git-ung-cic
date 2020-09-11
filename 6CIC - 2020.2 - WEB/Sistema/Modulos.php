<?php
$rsLista = listarRegistros($vConn, $tabela);
$campos=  mysqli_num_fields($rsLista);
?>
<table class="table">

    <tbody>
        <?php
        while ($dadosLista = mysqli_fetch_array($rsLista)) {
        ?>   
        <tr>
            <td><?=$dadosLista[0];?></td>            
            
        </tr>

        <?php
        }
        ?>
    </tbody>
    
</table>


