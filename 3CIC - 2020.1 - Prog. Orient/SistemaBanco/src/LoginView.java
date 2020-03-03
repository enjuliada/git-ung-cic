
import javax.swing.*; //pacote de elementos gráficos

public class LoginView {
    
    public LoginView(){
        
        String strNumConta, strSenha;
        
        strNumConta = JOptionPane.showInputDialog
                      ("Entre com o número da conta.");
        strSenha = JOptionPane.showInputDialog
                      ("Informe a senha.");
        
        if(BancoControl.objConta.validarCliente(strNumConta, strSenha) == true){
            //ok
            JOptionPane.showMessageDialog(null, "Acesso ao Sistema");
        }else{
            //erro
            JOptionPane.showMessageDialog(null, "Dados Inválidos");
        }
        
    }
    
}
