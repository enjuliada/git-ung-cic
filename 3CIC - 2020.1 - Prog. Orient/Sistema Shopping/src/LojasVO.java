
public class LojasVO {

    //declaração dos atributos
    private int lojas[] = new int[40]; //vetor de 40 posições
    private String nomes[] = new String[40]; //vetor de 40 posições
    private float faturamento;

    //método construtor
    public LojasVO() {

        for (int i = 0; i < lojas.length; i++) { //length -> retorna a dimensao do vetor
            lojas[i] = 0;
            nomes[i] = "";
        }//fechando for

        faturamento = 0;

    }//fechando construtor

    //métodos funcionais
    public int alocar(int andar, int numero, String nomeLoja) {
        int posicao;
        posicao = (andar * 10) + (numero - 1);

        if (numero > 10) {
            return -1; //posição 'loja' invalida
        } else if (posicao > 39) {
            return -1; //posição 'loja' invalida
        } else if (lojas[posicao] == 1) {
            return -2; //espaço ocupado
        } else {
            nomes[posicao] = nomeLoja;
            lojas[posicao] = 1; //ocupando espaço vazio (deixa de ser 0 e se torna 1)
            atualizarFaturamento(andar);
            return 1; // ok
        }
    }//fechando alocar

    public void atualizarFaturamento(int andar) {
        switch (andar) {
            case 0:
                faturamento += 8000;
                break;
            case 1:
                faturamento += 9500;
                break;
            case 2:
                faturamento += 12000;
                break;
            case 3:
                faturamento += 15000;
                break;
        }

    }//fechando atualizarFaturamento

    public float consultarFaturamento() {
        return faturamento;
    }

    //35 -> 3º andar - loja 4
    public int retirarLoja(int posicaoLoja) {
        int andar = posicaoLoja / 10;
        //int numeroLoja = posicaoLoja - (andar * 10) - 1;

        if (lojas[posicaoLoja] == 1) {

            lojas[posicaoLoja] = 0; //esvaziando espaço
            nomes[posicaoLoja] = "";

            switch (andar) {
                case 0:
                    faturamento -= 8000;
                    break;
                case 1:
                    faturamento -= 9500;
                    break;
                case 2:
                    faturamento -= 12000;
                    break;
                case 3:
                    faturamento -= 15000;
                    break;
            }
            return 1;
        } else {
            return 0; // nao existe loja nessa posição
        }

    }

    public String visualizarLojas(){
        String mapa = "", nomeLoja;
        
        for(int i = lojas.length - 1; i>=0; i--){
            if(lojas[i] == 1){ //existe loja
                nomeLoja = nomes[i];
                mapa += nomeLoja + "(" + i + ")" + " || ";
            }else{
                nomeLoja = "      "; 
                mapa += nomeLoja + " || ";
            }
            
            if(i%10 == 0){
                mapa+= "\n";
            }
            
        }
        
        return mapa;
        
    }//fechando visualizarLojas
    
}//fechando class
