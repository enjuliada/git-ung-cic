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

public class ChamadosView extends JInternalFrame implements ActionListener {

    public static JMenuBar mbrChamados;
    public static JMenu mnuArquivo;
    public static JMenuItem mniNovo, mniFechar;    
    
    public static String strCampos[] = {"ID", "Titulo:", "Data de Abertura:", "Responsável:", "Cód. Cliente:", "Nome do Cliente:", "Categoria:"};
    public static JLabel lblCampos[], lblIdCli, lblIdCham;
    public static JTextField txtCampos[], txtIdCli, txtIdCham;
    public static JLabel lblDescricao, lblSolucao;
    public static JComboBox cmbTipos;
    public static JTextArea txaDescricao, txaSolucao;
    public static JScrollPane scrDescricao, scrSolucao;
    public static Container ctnChamados;
    public static JButton btnRegistrar, btnEncerrar, btnFiltrar, btnAtualizar, btnSalvar;
    public static JTable tblChamados;
    public static JScrollPane scrChamados;
    public static DefaultTableModel mdlChamados;
    public static String strTopo[] = {"ID", "Titulo", "Data", "Cliente", "Categoria"};

    public static java.util.List<ChamadosVO> lstChamados = new ArrayList<ChamadosVO>();
    
    public ChamadosView() {

        super("Gerenciamento de Chamados");

        ctnChamados = new Container();
        ctnChamados.setLayout(null);
        this.add(ctnChamados);

        mbrChamados = new JMenuBar();
        this.setJMenuBar(mbrChamados);
        
        mnuArquivo = new JMenu("Arquivo");
        mnuArquivo.setMnemonic('a');
        mbrChamados.add(mnuArquivo);
        
        mniNovo = new JMenuItem("Novo Chamado", new ImageIcon("img/icons/new.png"));
        mniNovo.addActionListener(this);
        mnuArquivo.add(mniNovo);
        
        mnuArquivo.add(new JSeparator());
        
        mniFechar = new JMenuItem("Fechar", new ImageIcon("img/icons/exit.png"));
        mniFechar.addActionListener(this);
        mnuArquivo.add(mniFechar);
                
        btnRegistrar = new JButton("Registrar Solicitação");
        btnRegistrar.addActionListener(this);
        btnRegistrar.setEnabled(false);
        btnRegistrar.setBounds(30, 460, 370, 30);
        ctnChamados.add(btnRegistrar);

        btnAtualizar = new JButton("Atualizar");
        btnAtualizar.addActionListener(this);
        btnAtualizar.setEnabled(false);
        btnAtualizar.setBounds(450, 460, 115, 30);
        ctnChamados.add(btnAtualizar);
        
        btnSalvar = new JButton("Salvar");
        btnSalvar.addActionListener(this);
        btnSalvar.setEnabled(false);
        btnSalvar.setBounds(570, 460, 105, 30);
        ctnChamados.add(btnSalvar);

        btnEncerrar = new JButton("Encerrar Chamado");
        btnEncerrar.addActionListener(this);
        btnEncerrar.setEnabled(false);
        btnEncerrar.setBounds(685, 460, 115, 30);
        ctnChamados.add(btnEncerrar);

        lblDescricao = new JLabel("Descrição do Problema:");
        lblDescricao.setBounds(30, 265, 150, 20);
        ctnChamados.add(lblDescricao);

        txaDescricao = new JTextArea();
        txaDescricao.setLineWrap(true); //quebra de linha aut.
        scrDescricao = new JScrollPane(txaDescricao);
        scrDescricao.setBounds(30, 295, 370, 150);            
        ctnChamados.add(scrDescricao);

        lblSolucao = new JLabel("Solução");        
        lblSolucao.setBounds(460, 30, 200, 20);
        ctnChamados.add(lblSolucao);

        txaSolucao = new JTextArea();
        txaSolucao.setLineWrap(true);
        scrSolucao = new JScrollPane(txaSolucao);
        scrSolucao.setBounds(450, 55, 350, 390);
        ctnChamados.add(scrSolucao);

        lblIdCli = new JLabel("Filtrar por Cliente:");
        lblIdCli.setBounds(820, 45, 150, 20);
        ctnChamados.add(lblIdCli);

        txtIdCli = new JTextField();
        txtIdCli.setBounds(925, 45, 100, 20);
        ctnChamados.add(txtIdCli);

        lblIdCham = new JLabel("Buscar por ID:");
        lblIdCham.setBounds(1050, 45, 150, 20);
        ctnChamados.add(lblIdCham);

        txtIdCham = new JTextField();
        txtIdCham.setBounds(1135, 45, 55, 20);
        ctnChamados.add(txtIdCham);

        btnFiltrar = new JButton("Buscar");
        btnFiltrar.setBounds(1200, 45, 110, 20);
        ctnChamados.add(btnFiltrar);

        tblChamados = new JTable();
        scrChamados = new JScrollPane(tblChamados);
        mdlChamados = (DefaultTableModel) tblChamados.getModel();

        for (int i = 0; i < strTopo.length; i++) {
            mdlChamados.addColumn(strTopo[i]);
        }

        scrChamados.setBounds(820, 75, 490, 415);
        ctnChamados.add(scrChamados);
        
        //1. Evento na tabela
        carregarChamados();
        
        tblChamados.addMouseListener(new MouseAdapter() {
            public void mouseClicked(MouseEvent evt) {

                int idCham = Integer.parseInt(tblChamados.getValueAt(tblChamados.getSelectedRow(), 0).toString());

                try {
                    carregarCampos(ChamadosDAO.consultarChamado(idCham));
                } catch (Exception erro) {
                    JOptionPane.showMessageDialog(null, erro.getMessage(), "ERRO", JOptionPane.ERROR_MESSAGE);
                }

            }
        }
        );

        lblCampos = new JLabel[strCampos.length];
        txtCampos = new JTextField[strCampos.length - 1];
        for (int i = 0; i < lblCampos.length; i++) {
            lblCampos[i] = new JLabel(strCampos[i]);
            lblCampos[i].setBounds(30, 55 + (i * 30), 150, 20);
            ctnChamados.add(lblCampos[i]);

            if (i < lblCampos.length - 1) {
                txtCampos[i] = new JTextField();
                txtCampos[i].setBounds(160, 55 + (i * 30), 240, 20);
                ctnChamados.add(txtCampos[i]);
            }

            if (i == 3) { //carregando responsavel
                txtCampos[i].setText(SistemaControl.perfilUsuario.getLogin());
                txtCampos[i].setEditable(false);
            }

        }
        
        txtCampos[4].addFocusListener(new FocusAdapter() {
            public void focusLost(FocusEvent evt){                
                try{
                    ClientesVO tmpCliente = ClientesDAO.consultarCliente(txtCampos[4].getText());
                    txtCampos[5].setText(tmpCliente.getNomeEmpresa());
                }catch(Exception erro){
                    JOptionPane.showMessageDialog(null, erro.getMessage());
                }
            }
        });

        cmbTipos = new JComboBox(carregarTipos());
        cmbTipos.setBounds(160, 235, 240, 20);
        ctnChamados.add(cmbTipos);

        desbloquearCampos(false);
        
        this.setClosable(true);
        this.setSize(1350, 600);
        this.show();

    }//fechando construtor
    
    public void actionPerformed(ActionEvent evt){
        if(evt.getSource() == mniNovo){
            desbloquearCampos(true);
            txtCampos[0].setEditable(false);
            txtCampos[5].setEditable(false);
            txtCampos[0].setText(gerarId());
        }
        else if(evt.getSource() == btnRegistrar){
            try{
                
                ChamadosVO tmpChamado = new ChamadosVO();
                
                tmpChamado.setId(Integer.parseInt(txtCampos[0].getText()));
                tmpChamado.setStatus(0);
                tmpChamado.setTitulo(txtCampos[1].getText());
                tmpChamado.setDataAbertura(txtCampos[2].getText());
                tmpChamado.setLoginUsuario(txtCampos[3].getText());
                tmpChamado.setIdCliente(txtCampos[4].getText());
                tmpChamado.setIdCategoria(cmbTipos.getSelectedIndex()+1);
                tmpChamado.setDescricao(txaDescricao.getText());
                tmpChamado.setSolucao("");
                tmpChamado.setDataFechamento("2020-12-31");
                
                ChamadosDAO.registrarChamado(tmpChamado);
                
                JOptionPane.showMessageDialog(null, "Um novo chamado foi registrado");
                desbloquearCampos(false);
                
                
            }catch(Exception erro){
                JOptionPane.showMessageDialog(null, erro.getMessage());
            }
        }
        
        else if(evt.getSource() == btnAtualizar){
            txaSolucao.setEditable(true);
            btnSalvar.setEnabled(true);            
            
        }else if(evt.getSource() == btnSalvar){
            try{
                
            }catch(Exception erro){
                JOptionPane.showMessageDialog(null, erro.getMessage());
            }
        }
        
    }
    
    public static String gerarId(){
        int novoId = 0;
        
        try{
            novoId = ChamadosDAO.gerarId();
        }catch(Exception erro){
            JOptionPane.showMessageDialog(null, erro);
        }
        return "" + novoId;
    }
    
    public static void desbloquearCampos(boolean tmpStatus){
        for(int i=0; i<txtCampos.length;i++){
            txtCampos[i].setEditable(tmpStatus);
        }        
        cmbTipos.setEnabled(tmpStatus);      
        txaDescricao.setEditable(tmpStatus);
        txaSolucao.setEditable(tmpStatus);
        
        btnRegistrar.setEnabled(tmpStatus);
    }
    
    public static String[] carregarTipos(){
        
        String[] tipos = null;
        try{
            
            java.util.List<TiposVO> lstTipos = TiposDAO.listarTipos();
            tipos = new String[lstTipos.size()];
            int i=0;
            
            for(TiposVO tmpTipo: lstTipos){
                tipos[i] = tmpTipo.getId() + " - " + tmpTipo.getDescricao();
                i++;
            }
            
        }catch(Exception erro){
            JOptionPane.showMessageDialog(null, erro.getMessage(), "ERRO", JOptionPane.ERROR_MESSAGE);
        }
        
        return tipos;
    }

    //2. Listagem dos dados
    public static void carregarChamados() {

        while (mdlChamados.getRowCount() > 0) {
            mdlChamados.removeRow(0);
        }

        try {
            lstChamados = ChamadosDAO.listarChamados();

            for (ChamadosVO tmpChamado : lstChamados) {
                String dados[] = new String[5];

                dados[0] = "" + tmpChamado.getId();
                dados[1] = tmpChamado.getTitulo();
                dados[2] = tmpChamado.getDataAbertura();
                dados[3] = tmpChamado.getIdCliente();
                dados[4] = "" + tmpChamado.getIdCategoria();

                mdlChamados.addRow(dados);
            }

        } catch (Exception erro) {
            JOptionPane.showMessageDialog(null, erro.getMessage(), "ERRO", JOptionPane.ERROR_MESSAGE);
        }
    }//fechando carregarClientes

    public static void carregarCampos(ChamadosVO tmpChamado) {

        try {
            txtCampos[0].setText(""+tmpChamado.getId());
            txtCampos[1].setText(tmpChamado.getTitulo());
            txtCampos[2].setText(tmpChamado.getDataAbertura());
            txtCampos[3].setText(tmpChamado.getLoginUsuario());
            txtCampos[4].setText(tmpChamado.getIdCliente());
            txtCampos[5].setText(ClientesDAO.consultarCliente(tmpChamado.getIdCliente()).getNomeEmpresa());
            cmbTipos.setSelectedIndex(tmpChamado.getIdCategoria()-1);
            txaDescricao.setText(tmpChamado.getDescricao());
            txaSolucao.setText(tmpChamado.getSolucao());
            
            btnAtualizar.setEnabled(true);
            

        } catch (Exception erro) {
            JOptionPane.showMessageDialog(null, erro.getMessage(), "ERRO", JOptionPane.ERROR_MESSAGE);
        }
    }
    
}//fechando class
