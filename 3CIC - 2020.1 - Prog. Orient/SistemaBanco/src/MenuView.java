import javax.swing.*;

public class MenuView {
    
    public MenuView(){
        
        String msgMenu = "";
        int opcao;
        
        msgMenu += "*** MENU PRINCIPAL ***\n\n";
        msgMenu += "1 - Consultar Saldo\n";
        msgMenu += "2 - Depósito\n";
        msgMenu += "3 - Saque\n";
        msgMenu += "4 - Resgatar (Poupança -> CC)\n";
        msgMenu += "5 - Aplicar (CC -> Poupança)\n";
        msgMenu += "6 - Visualizar Extrato\n";
        msgMenu += "7 - Encerrar Aplicação\n\n";
        msgMenu += "Entre com a opção desejada: ";
        
        JOptionPane.showInputDialog(msgMenu);
        
    }
    
}
