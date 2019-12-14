//4 - métodos: Ordenação, BuscaLinear, BuscaBinária
public class Vetor {
    public int dim = 10000;
    public  int vDados[] = new int[dim]; 
    public long t0, tF, t;
    
    public void preencher(){
        int valor;
        t0 = System.currentTimeMillis();
        for(int i=0; i<dim; i++){
            valor = (int)(Math.random()*5000) + 1;
            vDados[i] = valor;            
        }
        tF = System.currentTimeMillis();
        t = tF - t0;
        System.out.println("Preenchimento do vetor: " + t + "ms");
    }//fechando preencher
    
    public void ordenar(){
        int i, j, aux;
        t0=System.currentTimeMillis();
        
        for(i=0; i<dim-1; i++){
            for(j=i+1; j<dim; j++){
                if(vDados[i]>vDados[j]){
                    aux = vDados[i];
                    vDados[i] = vDados[j];
                    vDados[j] = aux;
                }
            }
        }
        
        tF=System.currentTimeMillis();
        t = tF - t0;
        System.out.println("Ordenação do vetor: " + t + "ms");
        
    }
    
    public void exibir(){
        for(int i = 0; i<dim; i++){
            System.out.println (vDados[i] + " - ");
        }
    }
    
    public String buscaLinear(int chave){
        boolean achou = false;
        int local = -1;
        
        t0 = System.currentTimeMillis();
        for(int i = 0; i<dim; i++){
            if(chave == vDados[i]){
                achou = true;
                local = i;
                break;
            }
        }
        
        tF = System.currentTimeMillis();
        t = tF - t0;
                
        return "Encontrado em: " + local + " - " + t + "ms";
    }
    
    public String buscaBinaria(int chave){
        int in = 0, fim = dim-1, meio = (int)((dim-1)/2);
        int local = -1;
        t0 = System.currentTimeMillis();        
        while(in<=fim){
            meio = (fim + in) / 2;
            
            if(chave > vDados[meio]){
                in = meio + 1;                
            }else if(chave < vDados[meio]){
                fim = meio - 1;                
            }else if(chave == vDados[meio]){
                local = meio;
                break;
            }
            
        } //fechando while
        
        tF = System.currentTimeMillis();
        t = tF - t0;
        
        return "Encontrado em: " + local + " - " + t + "ms";
    }
    
    
}//fechando classe
