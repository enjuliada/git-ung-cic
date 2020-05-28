
import java.util.*; //Uso da ArrayList

public class Pedido {

    public String lanches[] = {"Big-Mac", "Cheddar McMelt",
        "Mc-Chicken", "Quarteirão",
        "Mc-Fish", "Big-Tasty",
        "Angus Bacon", "MC-Salad"};

    public float vLanches[] = {(float) 9.5, (float) 8,
        (float) 6.5, (float) 8,
        (float) 5, (float) 14.5,
        (float) 16, (float) 12.5};

    public String acomp[] = {"Mc-Fritas", "Mc-Nuggets",
        "Regriferante", "Água",
        "Casquinha", "Top-Sundae",
        "Mc-Flurry", "Milk-Shake"};

    public float vAcomp[] = {(float) 5.5, (float) 7,
        (float) 5, (float) 3,
        (float) 2.8, (float) 6.5,
        (float) 10, (float) 12};

    public float vTotal;

    public List<Item> lista = new ArrayList<Item>();

    public Pedido() {
        vTotal = 0;
    }

    public List adicionarItem(int idItem) {

        if (idItem < 8) {
            boolean achou = false;
            //percorrer os itens da lista
            for (Item itemAtual : lista) {
                if (idItem == itemAtual.getId()) { //já está na lista
                    achou = true;
                    itemAtual.setQtde(itemAtual.getQtde() + 1);
                    break;
                }
            }

            if (achou == false) {
                Item itemAtual = new Item();
                itemAtual.setId(idItem);
                itemAtual.setNome(lanches[idItem]);
                itemAtual.setValor(vLanches[idItem]);
                itemAtual.setQtde(1);
                lista.add(itemAtual);
            }

        }else{
            boolean achou = false;
            //percorrer os itens da lista
            for (Item itemAtual : lista) {
                if (idItem == itemAtual.getId()) { //já está na lista
                    achou = true;
                    itemAtual.setQtde(itemAtual.getQtde() + 1);
                    break;
                }
            }

            if (achou == false) {
                Item itemAtual = new Item();
                itemAtual.setId(idItem);
                itemAtual.setNome(acomp[idItem-8]);
                itemAtual.setValor(vAcomp[idItem-8]);
                itemAtual.setQtde(1);
                lista.add(itemAtual);
            }
        }

        
        return lista;

    }

    public float atualizarPedido(int tmpTipo, int idItem) {

        if (tmpTipo == 1) { //lanche
            vTotal += vLanches[idItem];
        } else if (tmpTipo == 2) { //acomp
            vTotal += vAcomp[idItem];
        }

        return vTotal;

    }//fechando atualizarPedido    

    public void limparPedido(){
        lista.clear();
        vTotal = 0;
    }
    
    
}//fechando Classe
