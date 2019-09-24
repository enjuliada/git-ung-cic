
import java.io.*;
import java.nio.file.*;
import java.nio.channels.*;
import javax.swing.filechooser.*;
import javax.swing.*;
import javax.swing.table.*;
import javax.swing.event.*;
import java.awt.event.*;
import java.awt.*;
import java.util.*;

public class ClientesView extends JInternalFrame implements ActionListener {

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
    public static JButton btnCidade, btnNome, btnRestaurar;

    //Declaração de variaveis e objetos auxiliares
    public static FileChannel flcOrigem, flcDestino;//cópia
    public static FileInputStream flsEntrada;//leitura
    public static FileOutputStream flsSaida;//leitura
    String strCaminhoOrigem, strCaminhoDestino, strNomeArquivoOrigem, extensao;
    int statusFoto;
    public static int statusAtual = 0;

    public ClientesView() {//construtor
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

        tblClientes.addMouseListener(new MouseAdapter() {
            public void mouseClicked(MouseEvent evt) {
                try {
                    String tmpCpf = tblClientes.getValueAt(tblClientes.getSelectedRow(), 0).toString();
                    ClientesVO tmpCliente = ClientesDAO.consultarCliente(tmpCpf);
                    carregarCampos(tmpCliente);

                } catch (Exception erro) {
                    JOptionPane.showMessageDialog(null, erro.getMessage());
                }
            }
        });

        lblBusca = new JLabel("Busca Rápida:");
        lblBusca.setBounds(600, 100, 100, 20);
        ctnClientes.add(lblBusca);

        txtBusca = new JTextField();
        txtBusca.setBounds(690, 100, 450, 20);
        ctnClientes.add(txtBusca);

        txtBusca.addKeyListener(new KeyAdapter() {
            public void keyReleased(KeyEvent evt) {
                carregarDados(3, txtBusca.getText());
            }
        }
        );

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

        btnCidade = new JButton("por Cidade", icnPais);
        btnCidade.addActionListener(this);
        btnCidade.setBounds(1170, 130, 150, 30);
        ctnClientes.add(btnCidade);

        btnNome = new JButton("por Nome", icnUsuario);
        btnNome.addActionListener(this);
        btnNome.setBounds(1170, 180, 150, 30);
        ctnClientes.add(btnNome);

        btnRestaurar = new JButton("Restaurar", icnRestaurar);
        btnRestaurar.addActionListener(this);
        btnRestaurar.setBounds(1170, 230, 150, 30);
        ctnClientes.add(btnRestaurar);

        desbloquearCampos(false);
        carregarDados(0, null);

        this.addInternalFrameListener(new InternalFrameAdapter() {
            public void internalFrameClosing(InternalFrameEvent evt) {
                MainView.btnMenu[0].setEnabled(true);
            }
        });

        this.setClosable(true);
        this.setSize(MainView.dskJanelas.getWidth(), MainView.dskJanelas.getHeight());
        this.show();

    }//fechando construtor

    public void actionPerformed(ActionEvent evt) {
        if (evt.getSource() == btnNovo) {
            desbloquearCampos(true);
            btnDesativar.setEnabled(false);
            limparCampos();

        } else if (evt.getSource() == btnSalvar) {
            boolean status = validarCampos();

            if (status == true) {

                if (statusFoto == JFileChooser.APPROVE_OPTION) {
                    //salvar a foto
                    int ultimoPonto = strNomeArquivoOrigem.lastIndexOf(".");//pegando a posição do ultimo ponto
                    extensao = strNomeArquivoOrigem.substring(ultimoPonto + 1, strNomeArquivoOrigem.length());
                    strCaminhoDestino = "img\\system\\" + txtCampos[0].getText() + "." + extensao;

                    try {
                        flsEntrada = new FileInputStream(strCaminhoOrigem);
                        flsSaida = new FileOutputStream(strCaminhoDestino);

                        flcOrigem = flsEntrada.getChannel();
                        flcDestino = flsSaida.getChannel();

                        //cópia total do arquivo
                        flcOrigem.transferTo(0, flcOrigem.size(), flcDestino);

                        flcOrigem.close();
                        flcDestino.close();

                    } catch (Exception erro) {
                        JOptionPane.showMessageDialog(null, erro.getMessage());
                    }
                }
                //cadastrar

                try{
                    ClientesVO novoCliente = new ClientesVO();
                    //preenchendo objeto
                    novoCliente.setCpf(txtCampos[0].getText());
                    novoCliente.setNome(txtCampos[1].getText());
                    novoCliente.setDataNascimento(txtCampos[2].getText());
                    novoCliente.setEndereco(txtCampos[3].getText());
                    novoCliente.setBairro(txtCampos[4].getText());
                    novoCliente.setCidade(txtCampos[5].getText());
                    novoCliente.setTelefone(txtCampos[6].getText());
                    novoCliente.setEmail(txtCampos[7].getText());
                    novoCliente.setStatus(1);
                    novoCliente.setFoto(txtCampos[0].getText() + "." + extensao);
                                        
                    ClientesDAO.cadastrarCliente(novoCliente);
                    JOptionPane.showMessageDialog(null, "Cliente " + novoCliente.getNome() + " cadastrado.");
                    desbloquearCampos(false);
                    limparCampos();
                    carregarDados(0, "");
                    
                    
                }catch(Exception erro){
                    JOptionPane.showMessageDialog(null, erro.getMessage());
                }
                
            }

        } else if (evt.getSource() == btnFoto) {

            JFileChooser flcFoto = new JFileChooser("C:\\Users\\280104398\\Documents");
            FileNameExtensionFilter filtro = new FileNameExtensionFilter("Arquivos de imagem(*.png, *.jpg)", "png", "jpg");
            flcFoto.setFileFilter(filtro);//vinculando chooser ao filtro
            statusFoto = flcFoto.showOpenDialog(this);//abre o explorer

            //preview da imagem
            strCaminhoOrigem = flcFoto.getSelectedFile().getPath();
            strNomeArquivoOrigem = flcFoto.getSelectedFile().getName();
            lblFoto.setIcon(new ImageIcon(strCaminhoOrigem));
        
        }else if(evt.getSource() == btnDesativar){
            try{
                String cpf = txtCampos[0].getText();
                
                ClientesDAO.alterarStatus(cpf, statusAtual);
                carregarDados(0, "");
                carregarCampos(ClientesDAO.consultarCliente(cpf));
                
                JOptionPane.showMessageDialog(null, "Status Alterado!");
                
                
            }catch(Exception erro){
                JOptionPane.showMessageDialog(null, erro.getMessage());
            }
            
        }else if(evt.getSource() == btnRestaurar){
            carregarDados(0, "");
            txtBusca.setText("");
            
        }else if(evt.getSource() == btnNome){
            String nome = JOptionPane.showInputDialog(
                            "Entre com o nome do cliente.");
            
            carregarDados(2,nome);  
            txtBusca.setText("");
            
        }else if(evt.getSource()== btnCidade){
            String cidade = JOptionPane.showInputDialog(
                            "Entre com a cidade: ");
            
            carregarDados(1, cidade);
            txtBusca.setText("");
            
            
        }
    }//fechando actionPerformed

    public static void carregarDados(int tmpTipo, String tmpBusca) {

        try {

            java.util.List<ClientesVO> lstClientes = new ArrayList<ClientesVO>();

            //limpando lista
            while (mdlClientes.getRowCount() > 0) {
                mdlClientes.removeRow(0);
            }

            //DAO >> VIEW
            lstClientes = ClientesDAO.listarClientes(tmpTipo, tmpBusca);

            for (ClientesVO tmpCliente : lstClientes) {//para cada obj cliente dentro da lista

                String dados[] = new String[4];
                dados[0] = tmpCliente.getCpf();
                dados[1] = tmpCliente.getNome();
                dados[2] = tmpCliente.getCidade();
                dados[3] = tmpCliente.getTelefone();

                mdlClientes.addRow(dados);
            }

        } catch (Exception erro) {
            JOptionPane.showMessageDialog(null, erro);
        }

    }//fechando carregarDados

    public static void carregarCampos(ClientesVO tmpCliente) {
        txtCampos[0].setText(tmpCliente.getCpf());
        txtCampos[1].setText(tmpCliente.getNome());
        txtCampos[2].setText(tmpCliente.getDataNascimento());
        txtCampos[3].setText(tmpCliente.getEndereco());
        txtCampos[4].setText(tmpCliente.getBairro());
        txtCampos[5].setText(tmpCliente.getCidade());
        txtCampos[6].setText(tmpCliente.getTelefone());
        txtCampos[7].setText(tmpCliente.getEmail());
        statusAtual = tmpCliente.getStatus();
        
        lblFoto.setIcon(new ImageIcon("img/system/" + tmpCliente.getFoto()));

        if (tmpCliente.getStatus() == 0) {
            txtCampos[0].setForeground(Color.red); //cpf
            txtCampos[1].setForeground(Color.red); //nome
            
            btnDesativar.setText("Ativar");
            
        } else {
            txtCampos[0].setForeground(Color.black); //cpf
            txtCampos[1].setForeground(Color.black); //nome
        
            btnDesativar.setText("Desativar");
        }
        
        desbloquearCampos(false);
        btnDesativar.setEnabled(true);

    }//fechando carregarCampos

    public static void desbloquearCampos(boolean tmpStatus) {
        for (int i = 0; i < txtCampos.length; i++) {
            txtCampos[i].setEditable(tmpStatus);
        }
        btnFoto.setEnabled(tmpStatus);
        btnDesativar.setEnabled(tmpStatus);
        btnSalvar.setEnabled(tmpStatus);
        btnNovo.setEnabled(!tmpStatus);
    }

    public static void limparCampos() {
        for (int i = 0; i < txtCampos.length; i++) {
            txtCampos[i].setText(null);
        }
        lblFoto.setIcon(new ImageIcon("img/user.png"));
    }

    public static boolean validarCampos() {

        for (int i = 0; i < txtCampos.length; i++) {
            if (txtCampos[i].getText().trim().equals("")) {
                JOptionPane.showMessageDialog(null,
                        "Preencha o campo " + strCampos[i]);
                txtCampos[i].grabFocus();//move o cursor pro campo espec.
                return false;
            }//fechando if
        }//fechando for                
        return true;
    }//fechando validar

}//fechando classe
