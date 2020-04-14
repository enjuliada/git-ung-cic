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
    public static JButton btnReset, btnAd, btnSub, btnMult, btnDiv, btnIg;
    
    /* 1.1. Declaração de variaveis/objetos auxiliares */
    public static Font fntVisor = new Font("Tahoma", Font.PLAIN, 18);   
        
    public CalcView(){ //método construtor
        
        super("Aplicação Calculadora"); //texto da barra de titulo
        
        /*** 2. INSTÂNCIA E CONFIG. DOS OBJETOS ***/
        ctnTela = new Container();
        ctnTela.setLayout(null);
        this.add(ctnTela); //add Container no JFrame
        
        lblTitulo = new JLabel("** 3º CIC - Ung **"); //instancia(construção)
        lblTitulo.setBounds(65,5,150,20); //posicionamento e dimensoes do objeto (X,Y,W,H)        
        ctnTela.add(lblTitulo); //add lbl no container
        
        txtVisor = new JTextField("0");
        txtVisor.setFont(fntVisor); 
        txtVisor.setHorizontalAlignment(txtVisor.RIGHT);
        txtVisor.setEditable(false);
        txtVisor.setBounds(10,30,200,50);
        ctnTela.add(txtVisor);    
        
        btnReset = new JButton("C");
        btnReset.setBounds(10,95,47,40);
        ctnTela.add(btnReset);
        
        btnAd = new JButton("+");
        btnAd.setBounds(62,95,100,40);
        ctnTela.add(btnAd);
        
        btnSub = new JButton("-");
        btnSub.setBounds(167,95,45,90);
        ctnTela.add(btnSub);
        
        btnMult = new JButton("*");
        btnMult.setBounds(167,195,45,40);
        ctnTela.add(btnMult);
        
        btnDiv = new JButton("/");
        btnDiv.setBounds(167,245,45,40);
        ctnTela.add(btnDiv);
        
        btnNumeros = new JButton[10]; //dimensionando vetor
        
        int xInicial = 10;
        int yInicial = 245;
        
        for(int i=0; i < btnNumeros.length; i++){
            btnNumeros[i] = new JButton("" + i);
            
            if(i != 0){
                btnNumeros[i].setBounds(xInicial, yInicial,47,40);                                
                xInicial += 52;
                
                if(i == 3 || i == 6){
                    xInicial = 10;
                    yInicial -= 50;
                }
            }else{
                btnNumeros[i].setBounds(10,295,100,40);                
            }
            ctnTela.add(btnNumeros[i]);            
        }
        
        btnIg = new JButton("=");
        btnIg.setBounds(115,295,97,40);
        ctnTela.add(btnIg);
        
        
        /*** 3. CONFIG. DA TELA ***/
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); //encerra processo JAVA ao fechar a janela
        this.setSize(230,375); //dimensoes do JFrame
        this.setResizable(false); //(des)habilita funcionamento da janela
        this.setVisible(true);//exibindo JFrame
        
    
    } //fechando construtor
    
}//fechando class
