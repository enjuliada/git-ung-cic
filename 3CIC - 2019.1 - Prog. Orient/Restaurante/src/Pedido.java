
import java.util.*; //ArrayList

public class Pedido {

    //Array de acompanhamentos
    public List<Acompanhamento> lista = new ArrayList<Acompanhamento>();

    //atributos
    public static float vRodizio, vAcompanhamentos,
            vServicos, vEstacionamento,
            vParcial, vTotal;
    public static int qtdePessoas;

    public static boolean stEstacionamento;

    //Itens de bebidas: deve seguir a ordem do vetor
    public static String sBebidas[] = {"Água", "Refrigerante",
        "Suco", "Café",
        "Milk Shake", "Toddynho",
        "Cerveja", "Vinho"};
    public static float vBebidas[] = {(float) 5, (float) 8,
        (float) 9.5, (float) 2.5,
        (float) 12, (float) 4,
        (float) 9.5, (float) 16};

    public static String sSobremesas[] = {"Pudim", "Bolo",
        "Mousse", "Sorvete",
        "Salada de Frutas", "Açaí",
        "Paçoca", "Petit Gateau"};
    public static float vSobremesas[] = {(float) 7, (float) 8.5,
        (float) 6, (float) 8.5,
        (float) 5, (float) 18,
        (float) 2, (float) 10};

    //contrutor
    public Pedido(float tmpVRodizio) {
        this.vRodizio = tmpVRodizio;
        this.qtdePessoas = 1;
        this.vParcial = 0;
        this.vAcompanhamentos = 0;
        this.vServicos = 0;
        this.vEstacionamento = 0;
        this.vTotal = 0;
    }

    public void adicionarAcompanhamento(int tmpTipo, int indice) {

        //variaveis que auxiliarão no procedimento da busca
        int cod;
        boolean achou = false;

        Acompanhamento novoAcomp = new Acompanhamento();

        if (tmpTipo == 1) {//Bebidas
            vAcompanhamentos += vBebidas[indice];
            cod = indice;

            for (Acompanhamento item : lista) {
                if (cod == item.getId()) {//se contem na lista
                    item.setQuantidade(item.getQuantidade() + 1); //add 1
                    achou = true;
                    break;
                }//fechando if
            }//fechando for

            if (!achou) { //se nao achou
                novoAcomp.setId(indice);
                novoAcomp.setNome(sBebidas[indice]);
                novoAcomp.setValor(vBebidas[indice]);
                novoAcomp.setQuantidade(1);
                lista.add(novoAcomp);
            }

        } else if (tmpTipo == 2) { //Sobremesas          
            vAcompanhamentos += vSobremesas[indice];
            cod = indice + 8;

            for (Acompanhamento item : lista) {
                if (cod == item.getId()) {//se contem na lista
                    item.setQuantidade(item.getQuantidade() + 1); //add 1
                    achou = true;
                    break;
                }//fechando if
            }//fechando for

            if (!achou) {
                novoAcomp.setId(indice + 8);
                novoAcomp.setNome(sSobremesas[indice]);
                novoAcomp.setValor(vSobremesas[indice]);
                novoAcomp.setQuantidade(1);
                lista.add(novoAcomp);
            }//fechando if..else
        }
    }

    public static float atualizarValores() {
        vParcial = vRodizio * qtdePessoas;
        vServicos = (vParcial + vAcompanhamentos) * (float) 0.1;

        if (stEstacionamento == true) {
            vEstacionamento = 15;
        } else {
            vEstacionamento = 0;
        }

        vTotal = vParcial + vAcompanhamentos + vServicos + vEstacionamento;
        return vTotal;
    }//fechando atualizar   

}//fechando classe    
