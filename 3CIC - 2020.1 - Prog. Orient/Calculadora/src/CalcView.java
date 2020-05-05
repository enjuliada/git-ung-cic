
import java.awt.*; //pacote do Container
import javax.swing.*; //pacote de elementos gráficos
import java.awt.event.*; //pacote de classe de ação em botoes

//cláusula extends faz referência ao conceito de herança
//Classe CalcView herdará as caracteristicas de um JFrame (janela)
//ActionListener - Classe de ação em botões
public class CalcView extends JFrame implements ActionListener {

    /**
     * * 1. DECLARAÇÃO DOS OBJETOS **
     */
    public static Container ctnTela;

    public static JLabel lblTitulo;
    public static JTextField txtVisor;
    public static JButton btnNumeros[];
    public static JButton btnReset, btnAd, btnSub, btnMult, btnDiv, btnIg;

    /* 1.1. Declaração de variaveis/objetos auxiliares */
    public static Font fntVisor = new Font("Tahoma", Font.PLAIN, 18);

    public static int digito = 0, oper = 0;
    public static float valor1 = 0, valor2 = 0;
    public static String valorAtual = "";

    public CalcView() { //método construtor

        super("Aplicação Calculadora"); //texto da barra de titulo

        /**
         * * 2. INSTÂNCIA E CONFIG. DOS OBJETOS **
         */
        ctnTela = new Container();
        ctnTela.setLayout(null);
        this.add(ctnTela); //add Container no JFrame

        lblTitulo = new JLabel("** 3º CIC - Ung **"); //instancia(construção)
        lblTitulo.setBounds(65, 5, 150, 20); //posicionamento e dimensoes do objeto (X,Y,W,H)        
        ctnTela.add(lblTitulo); //add lbl no container

        txtVisor = new JTextField("0");
        txtVisor.setFont(fntVisor);
        txtVisor.setHorizontalAlignment(txtVisor.RIGHT);
        txtVisor.setEditable(false);
        txtVisor.setBounds(10, 30, 200, 50);
        ctnTela.add(txtVisor);

        btnReset = new JButton("C");
        btnReset.addActionListener(this);
        btnReset.setBounds(10, 95, 47, 40);
        ctnTela.add(btnReset);

        btnAd = new JButton("+");
        btnAd.addActionListener(this);
        btnAd.setBounds(62, 95, 100, 40);
        ctnTela.add(btnAd);

        btnSub = new JButton("-");
        btnSub.addActionListener(this);
        btnSub.setBounds(167, 95, 45, 90);
        ctnTela.add(btnSub);

        btnMult = new JButton("*");
        btnMult.addActionListener(this);
        btnMult.setBounds(167, 195, 45, 40);
        ctnTela.add(btnMult);

        btnDiv = new JButton("/");
        btnDiv.addActionListener(this);
        btnDiv.setBounds(167, 245, 45, 40);
        ctnTela.add(btnDiv);

        btnNumeros = new JButton[10]; //dimensionando vetor

        int xInicial = 10;
        int yInicial = 245;

        for (int i = 0; i < btnNumeros.length; i++) {
            btnNumeros[i] = new JButton("" + i);
            btnNumeros[i].addActionListener(this);

            if (i != 0) {
                btnNumeros[i].setBounds(xInicial, yInicial, 47, 40);
                xInicial += 52;

                if (i == 3 || i == 6) {
                    xInicial = 10;
                    yInicial -= 50;
                }
            } else {
                btnNumeros[i].setBounds(10, 295, 100, 40);
            }
            ctnTela.add(btnNumeros[i]);
        }

        btnIg = new JButton("=");
        btnIg.addActionListener(this);
        btnIg.setBounds(115, 295, 97, 40);
        ctnTela.add(btnIg);

        /**
         * * 3. CONFIG. DA TELA **
         */
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); //encerra processo JAVA ao fechar a janela
        this.setSize(230, 375); //dimensoes do JFrame
        this.setResizable(false); //(des)habilita funcionamento da janela
        this.setVisible(true);//exibindo JFrame

    } //fechando construtor

    //Método actionPerformed responsável pela programação
    //dos botões
    public void actionPerformed(ActionEvent evt) {
        //PROGRAMAR AQUI A AÇÃO DOS BOTOES 

        for (int i = 0; i < btnNumeros.length; i++) {
            if (evt.getSource() == btnNumeros[i]) {

                if (digito < 9) {
                    if (digito == 0) {
                        if (i != 0) {
                            valorAtual = i + "";
                            txtVisor.setText(valorAtual);
                            digito++;
                        } else {
                            txtVisor.setText("0");
                        }
                    } else {
                        valorAtual += i + "";
                        digito++;
                        txtVisor.setText(valorAtual);
                    }
                }

            }//fechando if
        }//fechando for

        if (evt.getSource() == btnAd) {
            valor1 = Float.parseFloat(txtVisor.getText());
            btnAd.setBackground(new Color(90,150,210));
            btnSub.setBackground(null);
            btnMult.setBackground(null);
            btnDiv.setBackground(null);
            oper = 1;
            digito = 0;
        } else if (evt.getSource() == btnSub) {
            valor1 = Float.parseFloat(txtVisor.getText());
            btnSub.setBackground(new Color(90,150,210));
            btnAd.setBackground(null);
            btnMult.setBackground(null);
            btnDiv.setBackground(null);
            oper = 2;
            digito = 0;
        } else if (evt.getSource() == btnMult) {
            valor1 = Float.parseFloat(txtVisor.getText());
            btnMult.setBackground(new Color(90,150,210));
            btnSub.setBackground(null);
            btnAd.setBackground(null);
            btnDiv.setBackground(null);
            oper = 3;
            digito = 0;
        } else if (evt.getSource() == btnDiv) {
            valor1 = Float.parseFloat(txtVisor.getText());
            btnDiv.setBackground(new Color(90,150,210));
            btnSub.setBackground(null);
            btnMult.setBackground(null);
            btnAd.setBackground(null);
            oper = 4;
            digito = 0;
        }
        
        if(evt.getSource() == btnIg){
            valor2 = Integer.parseInt(txtVisor.getText());            
            float resultado = 0;
            resultado = executarOperacao(valor1, valor2, oper);
            txtVisor.setText(resultado + "");
            
            if(oper == 1){
                btnAd.setBackground(null);
            }
            
        }else if(evt.getSource() == btnReset){
            digito = 0;
            oper = 0;
            valor1 = 0;
            valor2 = 0;
            valorAtual = "";
            
            btnAd.setBackground(null);
            btnSub.setBackground(null);
            btnMult.setBackground(null);
            btnDiv.setBackground(null);
            
        }

        
        
    }//fechando actionPerformed

    public static float executarOperacao(float tmpV1, float tmpV2, int tmpOp){
        if(tmpOp == 1){
            return tmpV1 + tmpV2;
        }else if(tmpOp == 2){
            return tmpV1 - tmpV2;
        }else if(tmpOp == 3){
            return tmpV1 * tmpV2;
        }else{
            return tmpV1 / tmpV2;
        }
    }
    
}//fechando class
