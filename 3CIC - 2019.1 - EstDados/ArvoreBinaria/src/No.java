
public class No {

    public static No raiz;
    int valor;
    public No esquerda, direita;
    public static int nivel = 0;

    public No(int tmpValor) {
        this.valor = tmpValor;
    }

    public static void inserir(No tmpNo, int tmpValor) {
        if (raiz == null) {
            raiz = new No(tmpValor);
        } else {
            if (tmpValor < tmpNo.valor) {
                if (tmpNo.esquerda == null) {
                    tmpNo.esquerda = new No(tmpValor);
                } else {
                    inserir(tmpNo.esquerda, tmpValor);
                }
            } else if (tmpValor > tmpNo.valor) {
                if (tmpNo.direita == null) {
                    tmpNo.direita = new No(tmpValor);
                } else {
                    inserir(tmpNo.direita, tmpValor);
                }
            }
        }
    }//fechando inserir

    public static void exibir(No tmpNo) {
        if (tmpNo != null) {
            exibir(tmpNo.esquerda);
            System.out.println(tmpNo.valor + " - ");
            exibir(tmpNo.direita);
        }
    }//fechando exibir

    public static void informar(int tmpValor) {
        inserir(raiz, tmpValor);
    }

    public static void buscar(No tmpNo, int tmpChave) {
        if (raiz == null) {
            System.out.println("Árvore vazia");
        } else {
            if (tmpNo == null) {
                System.out.println("Não encontrado");
            } else {
                if (tmpChave < tmpNo.valor) {
                    nivel++;
                    buscar(tmpNo.esquerda, tmpChave);
                } else if (tmpChave > tmpNo.valor) {
                    nivel++;
                    buscar(tmpNo.direita, tmpChave);
                } else {
                    System.out.println("Encontrado em: " + nivel);
                }

            }
        }
    }
}
