
public class LojasVO {

    //declaração dos atributos
    private int lojas[] = new int[40]; //vetor de 40 posições
    private String nomes[] = new String[40]; //vetor de 40 posições
    private float faturamento;

    //método construtor
    public LojasVO() {

        
        
    }

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

}//fechando class
