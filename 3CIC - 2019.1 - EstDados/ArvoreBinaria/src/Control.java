
public class Control {

   
    public static void main(String[] args) {
        int valor;
        for(int i=0; i<20; i++){ //preenchendo arvore
            valor = (int) (Math.random() * 30) + 1;
            No.informar(valor);
        }
        
        No.exibir(No.raiz);
        No.buscar(No.raiz, 12);
       
    }
    
}
