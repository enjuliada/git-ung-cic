
import javax.swing.*; //pacote de elementos gráficos

public class LojasView {

    public int opcao;
    
    public LojasView() {
        
        do {
            String msgMenu = "";
            
            msgMenu += "Entre com a opção desejada:\n\n";
            msgMenu += "1 - Alocar loja\n";
            msgMenu += "2 - Retirar loja\n";
            msgMenu += "3 - Visualizar mapa do shopping\n";
            msgMenu += "4 - Verificar faturamento\n";
            msgMenu += "5 - Sair\n\n";
            msgMenu += "Opção:";
            
            opcao = Integer.parseInt(
                    JOptionPane.showInputDialog(msgMenu));
            
            
            if(opcao == 1){
                
                int status;
                
                String nome = JOptionPane.showInputDialog("Informe o nome da loja: ");
                int andar = Integer.parseInt(JOptionPane.showInputDialog("Informe o andar: "));
                int numero = Integer.parseInt(JOptionPane.showInputDialog("Número da loja: "));
                
                status = ShoppingControl.objLoja.alocar(andar, numero, nome);
                
                if(status == -1){
                    JOptionPane.showMessageDialog(null, "Andar/Número inválido.");
                }else if(status == -2){
                    JOptionPane.showMessageDialog(null, "Espaço já reservado.");
                }else if(status == 1){
                    JOptionPane.showMessageDialog(null, "Loja: " + nome + " registrada!");
                }
                
            }else if(opcao == 2){
            
            }else if(opcao == 3){
            
            }else if(opcao == 4){
            
            }else if(opcao == 5){
            
            }else {
                JOptionPane.showMessageDialog(null, "Opção Inválida");
            }
            
        } while (opcao != 5);

    }

}
