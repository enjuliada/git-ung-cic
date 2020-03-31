
public class LojasVO {

    //declaração dos atributos
    private int lojas[] = new int[40]; //vetor de 40 posições
    private String nomes[] = new String[40]; //vetor de 40 posições
    private float faturamento;
    
    //método construtor
    public LojasVO(){
        
    }
    
    //métodos funcionais
    
    public int alocar(int andar, int numero, String nomeLoja){
        int posicao;
        posicao = (andar * 10) + (numero - 1);
        
        
        if(numero > 10){
            return -1; //posição 'loja' invalida
        }else if(posicao > 39){
            return -1; //posição 'loja' invalida
        }else if(lojas[posicao] == 1){
            return -2; //espaço ocupado
        }else{
            return 1; // ok
        }
    }//fechando alocar
    
}//fechando class
