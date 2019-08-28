import javax.swing.*;
import javax.swing.table.*;
import java.awt.event.*;
import java.awt.*;

public class ClientesView extends JInternalFrame implements ActionListener{
    //declaração de objetos
    public static Container ctnClientes;
    
    public static String strCampos[] = {"CPF:", "Nome:", "Data de Nascimento:", "Endereço:", "Bairro:", "Cidade:", "Telefone:", "E-mail:"};
    public static JLabel lblCampos[];
    public static JTextField txtCampos[];
    
    public static ImageIcon imgFoto;
    public static JLabel lblFoto;
    
    public static String strTopo[] = {"CPF", "Nome", "Cidade", "Telefone"};
    public static JScrollPane scrClientes; //barra de rolagem da tabela
    public static JTable tblClientes;//tabela
    public static DefaultTableModel mdlClientes;//Classe que gerencia o conteudo da tabela
    
    public static JLabel lblBusca;
    public static JTextField txtBusca;
    public static JButton btnBusca;

    public static JButton btnNovo, btnSalvar, btnDesativar, btnFoto;
    public static ImageIcon icnPais, icnUsuario, icnRestaurar, icnBloquear;
    public static JButton btnBairro, btnNome, btnRestaurar;

    public ClientesView(){//construtor
        super("Gerenciamento de Clientes");
        
        //Construção dos objetos
        
        ctnClientes = new Container();
        ctnClientes.setLayout(null);
        this.add(ctnClientes);
        
        lblCampos = new JLabel[strCampos.length];
        txtCampos = new JTextField[strCampos.length];

        for (int i = 0; i < lblCampos.length; i++) {
            lblCampos[i] = new JLabel(strCampos[i]);
            lblCampos[i].setBounds(30, 100 + (i * 30), 150, 20);
            ctnClientes.add(lblCampos[i]);
            
            txtCampos[i] = new JTextField();
            txtCampos[i].setBounds(160, 100 + (i * 30), 240, 20);
            ctnClientes.add(txtCampos[i]);
            
            
        }//fechando for
        
        imgFoto = new ImageIcon("img/user.png");
        lblFoto = new JLabel(imgFoto);
        lblFoto.setBounds(440, 100, 128, 128);
        ctnClientes.add(lblFoto);

        btnFoto = new JButton("Selecionar imagem");
        btnFoto.addActionListener(this);
        btnFoto.setBounds(430, 240, 150, 20);
        ctnClientes.add(btnFoto);

        tblClientes = new JTable();
        scrClientes = new JScrollPane(tblClientes);
        mdlClientes = (DefaultTableModel) tblClientes.getModel();
        
        //Inserindo elementos no topo da tabela
        for (int i = 0; i < strTopo.length; i++) {
            mdlClientes.addColumn(strTopo[i]);
        }

        scrClientes.setBounds(600, 130, 550, 290);
        ctnClientes.add(scrClientes);

        lblBusca = new JLabel("Busca Rápida:");
        lblBusca.setBounds(600, 100, 100, 20);
        ctnClientes.add(lblBusca);

        txtBusca = new JTextField();
        txtBusca.setBounds(690, 100, 150, 20);
        ctnClientes.add(txtBusca);

                btnBusca = new JButton("Pesquisar");
        btnBusca.addActionListener(this);
        btnBusca.setBounds(850, 100, 100, 20);
        ctnClientes.add(btnBusca);

        btnNovo = new JButton("Novo Cliente");
        btnNovo.addActionListener(this);
        btnNovo.setBounds(430, 290, 150, 30);
        ctnClientes.add(btnNovo);

        btnSalvar = new JButton("Salvar dados");
        btnSalvar.addActionListener(this);
        btnSalvar.setBounds(430, 340, 150, 30);
        ctnClientes.add(btnSalvar);

        icnBloquear = new ImageIcon("img/icons/block.png");

        btnDesativar = new JButton("Desativar", icnBloquear);
        btnDesativar.setEnabled(false);
        btnDesativar.addActionListener(this);
        btnDesativar.setBounds(430, 390, 150, 30);
        ctnClientes.add(btnDesativar);

        icnPais = new ImageIcon("img/icons/country.png");
        icnUsuario = new ImageIcon("img/icons/user.png");
        icnRestaurar = new ImageIcon("img/icons/restore.png");

        btnBairro = new JButton("por Bairro", icnPais);
        btnBairro.addActionListener(this);
        btnBairro.setBounds(1170, 130, 150, 30);
        ctnClientes.add(btnBairro);

        btnNome = new JButton("por Nome", icnUsuario);
        btnNome.addActionListener(this);
        btnNome.setBounds(1170, 180, 150, 30);
        ctnClientes.add(btnNome);

        btnRestaurar = new JButton("Restaurar", icnRestaurar);
        btnRestaurar.addActionListener(this);
        btnRestaurar.setBounds(1170, 230, 150, 30);
        ctnClientes.add(btnRestaurar);

        this.setClosable(true);
        this.setSize(MainView.dskJanelas.getWidth(), MainView.dskJanelas.getHeight());
        this.show();       
        
    }//fechando construtor
    
    public void actionPerformed(ActionEvent evt){
        
    }
    
}
