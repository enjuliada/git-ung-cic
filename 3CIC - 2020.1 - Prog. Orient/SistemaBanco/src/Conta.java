
public class Conta {
    //declaração dos atributos
    private String titular, numeroConta, senha, extrato;
    private float saldoCC, saldoPP, limite; 
    
    //método construtor
    public Conta(String tmpTitular, String tmpNumeroConta, String tmpSenha){
        this.titular = tmpTitular;
        this.numeroConta = tmpNumeroConta;
        this.senha = tmpSenha;
        this.saldoCC = 0;
        this.saldoPP = 0;
        this.limite = -1000;
        this.extrato = "";
    }
    
    //métodos funcionais
    
    public void validarCliente(){
        
    }
    
    public void consultarSaldo(){
        
    }
    
    public void depositar(){
        
    }
    
    public void sacar(){
        
    }
    
    public void resgatar(){ //poupança -> corrente
        
    }
    
    public void aplicar(){ //corrente -> poupança
        
    }
    
    public void imprimirExtrato(){
        
    }
    
}
