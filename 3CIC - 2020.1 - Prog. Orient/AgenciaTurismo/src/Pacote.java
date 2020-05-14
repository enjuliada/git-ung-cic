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
    
    public Pacote(){ //método construtor
        
        totVoo=0;
        totAd=0;
        totalFinal=0;                
    }
    
    public float atualizarVoo(int tmpDest, int tmpNPess, int tmpComp, int tmpClasse, boolean tmpOp1, boolean tmpOp2, boolean tmpOp3){        
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
        
        //Opcionais de viagem
        if(tmpOp1) totVoo+=150;
        if(tmpOp2) totVoo+=120;
        if(tmpOp3) totVoo+=30;
        
        
        //Mult. pelo numero de pessoas
        totVoo *= tmpNPess;              
        
        return totVoo;
    }
    
    public void limparDados(){
        totVoo=0;
        totAd=0;
        totalFinal=0;                        
    }
    
    public void AdicionarItem(Adicional tmpAdic){
        //Semana que vem
    }
    
}
