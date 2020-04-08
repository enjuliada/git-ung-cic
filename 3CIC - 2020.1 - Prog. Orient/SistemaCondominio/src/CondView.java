
import java.awt.*;  //pacote awt (Container)
import javax.swing.*; //pacote de elementos gráficos

public class CondView extends JFrame {

    /******* 1. DECLARAÇÃO DOS OBJETOS ***********/
    public static Container ctnTela;
    
    public static JLabel lblBlocoA, lblBlocoB, lblTitulo1, lblTitulo2, lblTitulo3;
    public static JLabel lblTipo, lblProprietario, lblCaixa1, lblCaixa2;
    public static JLabel lblLocais, lblValorLocal;
    
    public static JButton btnBlocoA[][], btnBlocoB[][];
    
    public static JComboBox cmbTipo, cmbLocais; 
    public static JTextField txtProprietario;
    
    public static JButton btnNovo, btnRegistrar, btnAdicionar;
    
    /****Declaração de Objetos/Variáveis Auxiliares ****/
    public static Font fntTitulos = new Font("Arial", Font.BOLD, 26);
    public static Font fntTexto = new Font("Tahoma", Font.PLAIN, 18);
    public static Font fntDados = new Font("Verdana", Font.PLAIN, 18);
    
    public static String vTipos[] = {"Selecione a negociação","Venda", "Locação"};
    public static String vLocais[] = {"Selecione uma área","Salão de Festas", "Churrasqueira", "Churrasqueira c/ piscina"};
    public static float valores[] = {0,250,150,320};

    public CondView() { //método construtor

        super("Sistema de Gerenciamento de Vendas - Construtora CIC");

        /******* 2. CONSTRUÇÃO (INSTÂNCIA) + CONFIGURAÇÃO DOS OBJETOS *********/
        ctnTela = new Container();
        ctnTela.setLayout(null);
        this.add(ctnTela); //add Container no JFrame
        
        lblTitulo1 = new JLabel("Venda/Locação");
        lblTitulo1.setFont(fntTitulos);
        lblTitulo1.setForeground(new Color(0,0,60));
        lblTitulo1.setBounds(20,20,250,30);
        ctnTela.add(lblTitulo1);

        lblTipo = new JLabel("Tipo:");
        lblTipo.setFont(fntTexto);
        lblTipo.setForeground(new Color(60,60,60));
        lblTipo.setBounds(20,140,100,30);
        ctnTela.add(lblTipo);
        
        cmbTipo = new JComboBox(vTipos);
        cmbTipo.setFont(fntDados);
        cmbTipo.setForeground(new Color(60,60,60));
        cmbTipo.setBounds(20,180,250,30);
        cmbTipo.setEnabled(false); //desabilita o campo
        ctnTela.add(cmbTipo);
        
        lblProprietario = new JLabel("Nome do Proprietário:");
        lblProprietario.setFont(fntTexto);
        lblProprietario.setForeground(new Color(60,60,60));
        lblProprietario.setBounds(20,220,250,30);
        ctnTela.add(lblProprietario);
        
        txtProprietario = new JTextField();
        txtProprietario.setFont(fntDados);
        txtProprietario.setForeground(new Color(60,60,60));
        txtProprietario.setBounds(20,260,250,30);
        txtProprietario.setEditable(false);
        ctnTela.add(txtProprietario);
        
        btnRegistrar = new JButton("Registrar Imóvel");
        btnRegistrar.setFont(fntTexto);
        btnRegistrar.setForeground(new Color(60,60,60));
        btnRegistrar.setBounds(20,320,250,45);
        btnRegistrar.setEnabled(false);
        ctnTela.add(btnRegistrar);
        
        lblTitulo2 = new JLabel("Áreas Adicionais");
        lblTitulo2.setFont(fntTitulos);
        lblTitulo2.setForeground(new Color(0,0,60));
        lblTitulo2.setBounds(20,380,250,30);
        ctnTela.add(lblTitulo2);

        lblLocais = new JLabel("Áreas disponíveis:");
        lblLocais.setFont(fntTexto);
        lblLocais.setForeground(new Color(0,0,60));
        lblLocais.setBounds(20,420,250,30);
        ctnTela.add(lblLocais);
        
        cmbLocais = new JComboBox(vLocais);
        cmbLocais.setFont(fntDados);
        cmbLocais.setForeground(new Color(60,60,60));
        cmbLocais.setBounds(20,460,250,30);
        ctnTela.add(cmbLocais);
        
        lblValorLocal = new JLabel("Valor: R$ 0,00");
        lblValorLocal.setFont(fntDados);
        lblValorLocal.setForeground(new Color(0,0,60));
        lblValorLocal.setBounds(20,500,250,30);
        ctnTela.add(lblValorLocal);
        
        btnAdicionar = new JButton("Solicitar área");
        btnAdicionar.setFont(fntTexto);
        btnAdicionar.setForeground(new Color(60,60,60));
        btnAdicionar.setBounds(20,540,250,45);
        ctnTela.add(btnAdicionar);
        
        lblTitulo3 = new JLabel("Relatórios");
        lblTitulo3.setFont(fntTitulos);
        lblTitulo3.setForeground(new Color(0,0,60));
        lblTitulo3.setBounds(20,620,250,30);
        ctnTela.add(lblTitulo3);
        
        lblBlocoA = new JLabel("Bloco A");
        lblBlocoA.setFont(fntTitulos);
        lblBlocoA.setForeground(new Color(0,0,60));
        lblBlocoA.setBounds(350,20,150,30);
        ctnTela.add(lblBlocoA);
        
        lblBlocoB = new JLabel("Bloco B");
        lblBlocoB.setFont(fntTitulos);
        lblBlocoB.setForeground(new Color(0,0,60));
        lblBlocoB.setBounds(820,20,150,30);
        ctnTela.add(lblBlocoB);
        
        int xInicialA = 350;
        int xInicialB = 820;
        int yInicial = 60;
        
        btnBlocoA = new JButton[10][6];
        btnBlocoB = new JButton[10][6];
        
        for (int i = 9; i >= 0; i--) {
            for (int j = 0; j < 6; j++) {
                btnBlocoA[i][j] = new JButton(i + "" + (j+1));
                btnBlocoA[i][j].setBackground(new Color(0,255,150));
                btnBlocoA[i][j].setBounds(xInicialA,yInicial,60,60);
                ctnTela.add(btnBlocoA[i][j]);                
                xInicialA += 70;
                
                btnBlocoB[i][j] = new JButton(i + "" + (j+1));
                btnBlocoB[i][j].setBackground(new Color(0,255,150));
                btnBlocoB[i][j].setBounds(xInicialB,yInicial,60,60);
                ctnTela.add(btnBlocoB[i][j]);                
                xInicialB += 70;
            }
            xInicialA = 350;
            xInicialB = 820;
            yInicial += 70;
        }

        /**
         * ***** 3. CONFIGURAÇÕES DA JANELA **********
         */
        this.setLocation(340, 80);
        //this.setLocationRelativeTo(null); - centraliza a janela
        this.setResizable(false);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(1400,900);
        this.setVisible(true);

    }

}
