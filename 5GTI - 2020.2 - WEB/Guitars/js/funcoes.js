

function mostraDiv(numDiv, acao){
    
    var nomeDivA;
    var nomeDivF;
    
    if(numDiv == 1){ 
        nomeDivA='DivInfo1';
        nomeDivF='DivInfo2';
    
    
    }else if(numDiv == 2){
        nomeDivA='DivInfo2';
        nomeDivF='DivInfo1';
    }
    
    if(acao == 1){
        document.getElementById(nomeDivA).style.display = 'block';
        document.getElementById(nomeDivF).style.display = 'none';
    }else if(acao == 0){
        document.getElementById(nomeDivA).style.display = 'none';        
    }
    
}