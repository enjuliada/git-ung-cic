import java.util.*;  //ArrayList


public class Pacote {
    
    public String destinos[] = {"Selecione","Rio de Janeiro","Miami",
                                "Los Angeles", "Las Vegas",
                                "Nova Iorque", "Milão",
                                "Madrid", "Paris"};    
    public float vDestinosEcon[] = {0,350,4800,5300,5000,
                                    5500,6800,6500,7200};
    public float vDestinosExec[] = {0,800,9000,10000,9500,
                                    12000,15000,14000,16000};
    
    public String aereas[] = {"Selecione","Gol","Latam","Delta",
                              "American Airlines","Air France"};  
    public float vAereas[] = {0,(float)0.1,(float)0.12,(float)0.15,
                              (float)0.14,(float)0.18};  
    
    public String classes[] = {"Selecione","Econômica", "Executiva"};
    
    public String adicionais[] = {"Hospedagem","City Tour",
                                  "Jantar Rom.", "Passeio de Lancha",
                                  "Book de Fotos", "Guia Turíst.",
                                  "Balada", "Tradutor"};    
    public float vAdicionais[] = {150,60,240,200,
                                  350,180,250,170};
    
    public float totVoo, totAd, totalFinal;
    
    public List<Adicional> listaAdic = new ArrayList<Adicional>();
    
    public String item, dadosNF;
    
    public Pacote(){ //método construtor
        
        totVoo=0;
        totAd=0;
        totalFinal=0; 
        item = "";
        dadosNF = "";
    }
    
    public float atualizarVoo(int tmpDest, int tmpNPess, int tmpComp, int tmpClasse, boolean tmpOp1, boolean tmpOp2, boolean tmpOp3){        
        dadosNF = "";
        //Valor do Destino (Econ / Exec)
        if(tmpClasse == 1){
            totVoo = vDestinosEcon[tmpDest];
        }else if(tmpClasse == 2){
            totVoo = vDestinosExec[tmpDest];
        }
        
        //Reajuste da Companhia Aerea sobre o destino
        if(tmpComp == 1){ //10
            totVoo += totVoo * 0.1;
        }else if(tmpComp == 2){ //12
            totVoo += totVoo * 0.12;
        }else if(tmpComp == 3){ //15
            totVoo += totVoo * 0.15;
        }else if(tmpComp == 4){ //14
            totVoo += totVoo * 0.14;
        }else if(tmpComp == 5){ //18
            totVoo += totVoo * 0.18;            
        }
        
        String opc = "";
        
        //Opcionais de viagem
        if(tmpOp1) {
            totVoo+=150;
            opc+="Opc.1 - Bagagem Adicional\r\n";
        }
        
        if(tmpOp2) {
            totVoo+=120;
            opc+="Opc.2 - Refeição Extra\r\n";
        }
        
        if(tmpOp3) {
            totVoo+=30;
            opc+="Opc.3 - Champagne\r\n";
        }
        
        
        //Mult. pelo numero de pessoas
        totVoo *= tmpNPess; 
        
        dadosNF += "Destino: " + destinos[tmpDest] + "\r\n";
        dadosNF += "Número de Passageiros: " + tmpNPess + "\r\n";
        dadosNF += "Companhia Aérea: " + aereas[tmpComp] + "\r\n";
        dadosNF += "Classe: " + classes[tmpClasse] + "\r\n";
        dadosNF += "-------------------------------------------------------------\r\n\r\n";
        dadosNF += "***** Opcionais de Vôo ******\r\n";
        dadosNF += opc + "\r\n";
        
        return totVoo;
    }
    
    public void limparDados(){
        totVoo=0;
        totAd=0;
        totalFinal=0;    
        
        listaAdic.clear();
    }
    
    public float adicionarItem(Adicional tmpAdic){
       
        int tmpId = tmpAdic.getId();
        boolean achou = false;
        
        for(Adicional atual: listaAdic){
            if(atual.getId() == tmpId){
                achou = true;
                atual.setQtde(atual.getQtde()+1);
                atual.setValor(atual.getValor() + vAdicionais[tmpId]);
                break;
            }
        }
        
        if(achou == false){
            listaAdic.add(tmpAdic); //adiciona um objeto a uma arraylist do mesmo tipo
        }
        
        totAd += tmpAdic.getValor();        
        
        item = "";
        for(Adicional atual: listaAdic){
            item += atual.getNome() + " -------- " + atual.getQtde();
            item += " -------- " + atual.getValor() + "\r\n";
        }
        
        return totAd;
        
    }
    
    
    public float getTotal(){
        return totVoo + totAd;
    }
    
    public String getNF(){
        dadosNF+=item;
        return dadosNF;
    }
    
}
