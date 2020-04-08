
import java.awt.*;  //pacote awt (Container)
import javax.swing.*; //pacote de elementos gráficos

public class CondView extends JFrame {

    /**
     * ***** 1. DECLARAÇÃO DOS OBJETOS **********
     */
    public static Container ctnTela;
    
    public static JLabel lblBlocoA, lblBlocoB;
    public static JButton btnBlocoA[][], btnBlocoB[][];

    public CondView() { //método construtor

        super("Sistema de Gerenciamento de Vendas - Construtora CIC");

        /**
         * ***** 2. CONSTRUÇÃO (INSTÂNCIA) + CONFIGURAÇÃO DOS OBJETOS **********
         */
        ctnTela = new Container();
        ctnTela.setLayout(null);
        this.add(ctnTela); //add Container no JFrame

        lblBlocoA = new JLabel("Bloco A");
        lblBlocoA.setFont(new Font("Arial", Font.BOLD, 26));
        lblBlocoA.setForeground(new Color(0,0,60));
        lblBlocoA.setBounds(350,20,150,30);
        ctnTela.add(lblBlocoA);
        
        lblBlocoB = new JLabel("Bloco B");
        lblBlocoB.setFont(new Font("Arial", Font.BOLD, 26));
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
