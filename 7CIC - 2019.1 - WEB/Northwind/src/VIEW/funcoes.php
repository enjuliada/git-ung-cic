
 <?php
 function retornaData($tmpData){
        
        $dataUs = substr($tmpData, 0, 10);
        $vData = explode('-',$dataUs);
        $dataBr = $vData[2]."-".$vData[1]."-".$vData[0];
        
        return $dataBr;
 }
 

    