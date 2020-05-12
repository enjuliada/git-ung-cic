import javax.swing.*;
import javax.swing.table.*;
import java.awt.*;
import java.awt.event.*;

public class View extends JFrame implements ActionListener{
    
    //1 - Declaração dos objetos
    public static Container ctnTela;
    public static ImageIcon imgLanches[], imgAcomp[];
    public static JButton btnLanches[], btnAcomp[];
        
    public static JLabel lblLanches, lblAcomp;
    
    public static JTable tblItens; //tabela
    public static JScrollPane scrItens; //barra de rolagem da tabela
    public static DefaultTableModel mdlItens; //gerenciar itens da tabela
        
    
    public View(){ //construtor
        
        super("Aplicação Lanchonete - 3CIC"); //barra de titulo da janela
        
        //2 - Construção dos objetos (inst. e config)
        ctnTela = new Container();
        ctnTela.setLayout(null);
        this.add(ctnTela); //add Container na Janela
        
        lblLanches = new JLabel("Lanches");
        lblLanches.setBounds(360,200,100,20);
        ctnTela.add(lblLanches);
        
        lblAcomp = new JLabel("Acompanhamentos");
        lblAcomp.setBounds(330,350,150,20);
        ctnTela.add(lblAcomp);
        
        imgLanches = new ImageIcon[8];
        btnLanches = new JButton[8];
        imgAcomp = new ImageIcon[8];
        btnAcomp = new JButton[8];
        for(int i=0; i<btnLanches.length; i++){
            imgLanches[i] = new ImageIcon("img/L" + i + ".jpg");
            btnLanches[i] = new JButton(imgLanches[i]);
            btnLanches[i].setBounds(25 + (95*i),235, 80, 80);
            ctnTela.add(btnLanches[i]);
            
            imgAcomp[i] = new ImageIcon("img/A" + i + ".jpg");
            btnAcomp[i] = new JButton(Control.objPedido.acomp[i]);
            btnAcomp[i].setBounds(25 + (95*i),385, 80, 80);
            ctnTela.add(btnAcomp[i]);            
        }
        
        
        
        
        
        
        
        //3 - Configuração da Janela
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setResizable(false);
        this.setSize(800,600);
        this.setVisible(true);
        
    }
    
    public void actionPerformed(ActionEvent evt){ //ação em botões
        
    }
    
}//fechando classe
