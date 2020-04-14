import java.awt.*; //pacote do Container
import javax.swing.*; //pacote de elementos gráficos

//cláusula extends faz referência ao conceito de herança
//Classe CalcView herdará as caracteristicas de um JFrame (janela)
public class CalcView extends JFrame {
    
    /*** 1. DECLARAÇÃO DOS OBJETOS ***/
    public static Container ctnTela;
    
    public static JLabel lblTitulo;
    public static JTextField txtVisor;
    public static JButton btnNumeros[];
    
    public CalcView(){ //método construtor
        
        super("Aplicação Calculadora"); //texto da barra de titulo
        
        /*** 2. INSTÂNCIA E CONFIG. DOS OBJETOS ***/
        lblTitulo = new JLabel("** 3º CIC - Ung **"); //instancia(construção)
                
        
        /*** 3. CONFIG. DA TELA ***/
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); //encerra processo JAVA ao fechar a janela
        this.setSize(230,320); //dimensoes do JFrame
        this.setResizable(false); //(des)habilita funcionamento da janela
        this.setVisible(true);//exibindo JFrame
        
    
    } //fechando construtor
    
}//fechando class
