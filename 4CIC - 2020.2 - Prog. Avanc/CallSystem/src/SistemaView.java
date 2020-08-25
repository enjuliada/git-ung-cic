import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class SistemaView extends JFrame implements ActionListener{

    /***** 1 - DECLARAÇÃO DOS OBJETOS ******/
        public static Container ctnPrincipal, ctnModulos;
        public static JDesktopPane dskJanelas;
        public static ImageIcon imgModulos[];
        public static JButton btnModulos[];
    
    public SistemaView(){ //construtor
        super("Sistema de Gerenciamento de Vendas - 4CIC");
        
        /**** 2 - CONSTRUÇÃO DOS OBJETOS ****/
        ctnPrincipal = new Container();
        ctnPrincipal.setLayout(new BorderLayout());
        this.add(ctnPrincipal);//add ctnPrinc na janela
        
        ctnModulos = new Container();
        ctnModulos.setLayout(new GridLayout(1,8));
        ctnPrincipal.add(ctnModulos, BorderLayout.NORTH); //add ctnMd no norte do princ
        
        dskJanelas = new JDesktopPane();
        ctnPrincipal.add(dskJanelas, BorderLayout.CENTER);
        
        String strModulos[]={"Clientes", "Produtos", "Fornecedores", "Funcionários",
                             "Vendas", "Chamados", "Usuários", "Sair"};
        
        imgModulos = new ImageIcon[8];
        btnModulos = new JButton[8];
        for(int i=0; i<strModulos.length;i++){
            imgModulos[i] = new ImageIcon("img/icons/" + i + ".png");
            btnModulos[i] = new JButton(imgModulos[i]);
            btnModulos[i].setEnabled(false);
            btnModulos[i].setToolTipText(strModulos[i]);
            btnModulos[i].addActionListener(this);
            btnModulos[i].setBackground(Color.white);
            ctnModulos.add(btnModulos[i]);
        }        
        
        //this.setUndecorated(true);tira as bordas da janela
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setResizable(false);
        this.setSize(this.getFullScreen().width, this.getFullScreen().height-30);
        this.setVisible(true);
        
        LoginView telaLogin = new LoginView();//instanciando tela de login
        dskJanelas.add(telaLogin); //abrindo a tela dentro do dskJanelas
        
        
    }//fechando const
    
    public static Dimension getFullScreen(){
        Toolkit info = Toolkit.getDefaultToolkit();//classe que pega info do sistema
        Dimension res = info.getScreenSize();//pegando resolução
        
        return res; //retornando resolução                
    }
    
    public void actionPerformed(ActionEvent evt){ //ação botoes
        
        
    }//fechando actPerf
    
}//fechando class
