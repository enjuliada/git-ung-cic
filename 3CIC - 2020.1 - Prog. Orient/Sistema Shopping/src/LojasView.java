
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
            
                int status;
                int numero = Integer.parseInt(JOptionPane.showInputDialog("Informe o número da loja: "));
                
                status = ShoppingControl.objLoja.retirarLoja(numero);
                
                if(status == 0){
                    JOptionPane.showMessageDialog(null, "Não existe loja nessa posição");
                }else{
                    JOptionPane.showMessageDialog(null, "Contrato finalizado");
                }                
                
            }else if(opcao == 3){
                //Mapa do shopping
                
                String mapa = ShoppingControl.objLoja.visualizarLojas();
                JOptionPane.showMessageDialog(null, mapa);
                
            }else if(opcao == 4){
                float faturamento = ShoppingControl.objLoja.consultarFaturamento();
                JOptionPane.showMessageDialog(null, "Faturamento Mensal : R$ "+ 
                                                                    faturamento);
                        
            }else if(opcao == 5){
            
            }else {
                JOptionPane.showMessageDialog(null, "Opção Inválida");
            }
            
        } while (opcao != 5);

    }

}
