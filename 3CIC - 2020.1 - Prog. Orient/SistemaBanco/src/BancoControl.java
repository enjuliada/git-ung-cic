
public class BancoControl {

    public static Conta objConta;
    
    public static void main(String[] args) {
        objConta = new Conta("João Ortiz", "4404-1", "1234");
        
       LoginView appLogin = new LoginView(); //chamando tela de login 
    }
    
}
