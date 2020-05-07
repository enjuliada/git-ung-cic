import javax.swing.*;  //elementos gráficos de tela
import javax.swing.table.*; //gerenciamento de tabelas
import java.awt.*; //Container
import java.awt.event.*; //ActionListener (botoes)
import java.io.*; //gravação em disco


public class AgenciaView extends JFrame{
    
    //Declaração dos objetos
    public static Container ctnTela;
    public static JLabel lblBanner, lblTitulo, lblDestino, lblImgDestino,
                         lblPessoas, lblAerea, lblClasse,
                         lblVoo, lblValorVoo, lblAdic, lblValorAdic,
                         lblTotal, lblValorTotal;
   
    public static JComboBox cmbDestino, cmbAerea, cmbClasse;    
    public static JTextField txtPessoas;   
    
    public static JScrollPane scrItens;
    public static JTable tblItens;
    public static DefaultTableModel mdlItens;
    
    //Declaração de variaveis auxiliares
    public static Font fntTitulo = new Font("Tahoma", Font.BOLD, 26);
    public static Font fntTexto = new Font("Tahoma", Font.BOLD, 20);
    public static Font fntCampos = new Font("Tahoma", Font.PLAIN, 20);
    
    public static String legenda[] = {"Nome", "Qtde", "Valor"};
    
    public AgenciaView(){
        
        super(":: Agência de Turismo - UNGCIC - Burlando a quarentena ::");
        
        //Construção e configuração dos objetos
        ctnTela = new Container();
        ctnTela.setLayout(null);
        this.add(ctnTela);
        
        lblBanner = new JLabel(new ImageIcon("images/banner.jpg"));
        lblBanner.setBounds(0,0,800,100);
        ctnTela.add(lblBanner);
        
        lblTitulo = new JLabel("Monte seu pacote");
        lblTitulo.setFont(fntTitulo);
        lblTitulo.setBounds(280,110,300,30);
        ctnTela.add(lblTitulo);
        
        lblDestino = new JLabel("Destino:");
        lblDestino.setFont(fntTexto);
        lblDestino.setBounds(10,150,150,25);
        ctnTela.add(lblDestino);
        
        lblImgDestino = new JLabel(new ImageIcon("images/dest0.jpg"));
        lblImgDestino.setBounds(10,210,200, 60);
        ctnTela.add(lblImgDestino);
        
        cmbDestino = new JComboBox(AgenciaControl.objPacote.destinos);
        cmbDestino.setFont(fntCampos);
        cmbDestino.setBounds(10,180,200, 25);
        ctnTela.add(cmbDestino);
        
        cmbDestino.addItemListener(new ItemListener() {
            public void itemStateChanged(ItemEvent evt) {
                lblImgDestino.setIcon(new ImageIcon("images/dest" + 
                        cmbDestino.getSelectedIndex() + ".jpg"));
            }
        }
        );        
        
        lblPessoas = new JLabel("Qtde. Pessoas:");
        lblPessoas.setFont(fntTexto);
        lblPessoas.setBounds(10,275,200,25);
        ctnTela.add(lblPessoas);
        
        txtPessoas = new JTextField("1");
        txtPessoas.setFont(fntCampos);
        txtPessoas.setBounds(10,305,200,25);
        ctnTela.add(txtPessoas);
        
        lblAerea = new JLabel("Companhia:");
        lblAerea.setFont(fntTexto);
        lblAerea.setBounds(10,335,200,25);
        ctnTela.add(lblAerea);
        
        cmbAerea = new JComboBox(AgenciaControl.objPacote.aereas);
        cmbAerea.setFont(fntCampos);
        cmbAerea.setBounds(10,365,200,25);
        ctnTela.add(cmbAerea);
        
        lblClasse = new JLabel("Classe:");
        lblClasse.setFont(fntTexto);
        lblClasse.setBounds(10,395,200,25);
        ctnTela.add(lblClasse);
        
        cmbClasse = new JComboBox(AgenciaControl.objPacote.classes);
        cmbClasse.setFont(fntCampos);
        cmbClasse.setBounds(10,425,200,25);
        ctnTela.add(cmbClasse);
        
        lblVoo = new JLabel("Valor do Vôo:");
        lblVoo.setFont(fntTexto);
        lblVoo.setBounds(10,530,200,25);
        ctnTela.add(lblVoo);
        
        lblValorVoo = new JLabel("R$ 0,00");
        lblValorVoo.setFont(fntCampos);
        lblValorVoo.setBounds(150,530,200,25);
        ctnTela.add(lblValorVoo);
        
        lblAdic = new JLabel("Valor Adicionais:");
        lblAdic.setFont(fntTexto);
        lblAdic.setBounds(320,530,200,25);
        ctnTela.add(lblAdic);
        
        lblValorAdic = new JLabel("R$ 0,00");
        lblValorAdic.setFont(fntCampos);
        lblValorAdic.setBounds(500,530,200,25);
        ctnTela.add(lblValorAdic);
        
        lblTotal = new JLabel("Valor Total:");
        lblTotal.setFont(fntTitulo);
        lblTotal.setBounds(10,580,200,30);
        ctnTela.add(lblTotal);
        
        lblValorTotal = new JLabel("R$ 0,00");
        lblValorTotal.setFont(fntTitulo);
        lblValorTotal.setBounds(180,583,200,25);
        ctnTela.add(lblValorTotal);
        
        tblItens  = new JTable();
        scrItens = new JScrollPane(tblItens);
        mdlItens = (DefaultTableModel) tblItens.getModel();
        
        scrItens.setBounds(250,180,250,270);
        ctnTela.add(scrItens);
        
        for(int i=0;i<legenda.length; i++){
            mdlItens.addColumn(legenda[i]);
        }
        
        //Configuração da Janela
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(800,650);
        this.setResizable(false);
        this.setVisible(true);
        
    }
    
}
