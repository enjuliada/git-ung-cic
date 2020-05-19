import java.util.*; //Uso da ArrayList

public class Pedido {
    
    public String lanches[]={"Big-Mac","Cheddar McMelt",
                             "Mc-Chicken", "Quarteirão",
                             "Mc-Fish", "Big-Tasty",
                             "Angus Bacon", "MC-Salad"};
    
    public float vLanches[] = {(float)9.5, (float)8,
                               (float)6.5, (float)8,
                               (float)5, (float)14.5,
                               (float)16, (float)12.5};
    
    public String acomp[]={"Mc-Fritas","Mc-Nuggets",
                           "Regriferante", "Água",
                           "Casquinha", "Top-Sundae",
                           "Mc-Flurry", "Milk-Shake"};
    
    public float vAcomp[] = {(float)5.5, (float)7,
                             (float)5, (float)3,
                             (float)2.8, (float)6.5,
                             (float)10, (float)12};
    
    public float vTotal;
    
    public List<Item> lista = new ArrayList<Item>();
    
    public Pedido(){
        vTotal = 0;
    }
    
    public List adicionarItem(int idItem){

        Item itemAtual = new Item();
        
        itemAtual.setId(idItem);
        itemAtual.setNome(lanches[idItem]);
        itemAtual.setValor(vLanches[idItem]);        
        itemAtual.setQtde(1);        
        //if(qtde)
        
        lista.add(itemAtual);
        
        return lista;
        
    }
    
    public float atualizarPedido(int tmpTipo, int idItem){
        
        if(tmpTipo == 1){ //lanche
            vTotal += vLanches[idItem];            
        }else if(tmpTipo == 2){ //acomp
            vTotal += vAcomp[idItem];
        }
        
        return vTotal;
    
    }//fechando atualizarPedido    
    
}//fechando Classe
