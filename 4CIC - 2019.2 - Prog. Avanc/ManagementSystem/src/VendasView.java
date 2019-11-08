
import javax.swing.table.*;
import javax.swing.*;
import java.awt.event.*;
import java.awt.*;
import java.util.*;

public class VendasView extends JInternalFrame implements ActionListener {

    public static Container ctnVendas;
    public static JLabel lblId, lblTotal;
    public static JTextField txtId;
    public static JLabel[] lblCliente;
    public static JTextField[] txtCliente;
    public static String strCliente[] = {"CPF:", "Nome:", "Endereço:", "Bairro:"};
    public static JLabel[] lblProduto;
    public static JTextField[] txtProduto;
    public static String strProduto[] = {"Código:", "Nome:", "Valor Unitário:", "Quantidade:"};

    public static JButton btnAdicionar;

    public static String strTopoItens[] = {"ID", "Nome", "Valor Unitário", "Quantidade", "Valor Parcial"};
    public static JScrollPane scrItens; //barra de rolagem da tabela
    public static JTable tblItens;//tabela
    public static DefaultTableModel mdlItens;//Classe que gerencia o conteudo da tabela

    public static String strTopoProd[] = {"Código", "Nome", "Valor Unitário", "Estoque"};
    public static JScrollPane scrProd; //barra de rolagem da tabela
    public static JTable tblProd;//tabela
    public static DefaultTableModel mdlProd;//Classe que gerencia o conteudo da tabela

    /**
     * Objetos e variaveis auxiliares*
     */
    public static java.util.List<ItensVO> itens = new ArrayList<ItensVO>();
    public static float totalVenda;

    public VendasView() {

        super("Gerenciamento de Vendas");

        ctnVendas = new Container();
        ctnVendas.setLayout(null);
        this.add(ctnVendas);

        lblId = new JLabel("Id da Venda: ");
        lblId.setBounds(30, 75, 150, 20);
        ctnVendas.add(lblId);
        
        txtId = new JTextField("");
        txtId.setBounds(160, 75, 150, 20);
        ctnVendas.add(txtId);
        
        try{
            int idAtual = VendasDAO.gerarCodigo();
            txtId.setText("" + idAtual);
        }catch(Exception erro){
            JOptionPane.showMessageDialog(null, erro.getMessage());
        }
        

        lblCliente = new JLabel[4];
        txtCliente = new JTextField[4];
        lblProduto = new JLabel[4];
        txtProduto = new JTextField[4];

        for (int i = 0; i < strCliente.length; i++) {
            lblCliente[i] = new JLabel(strCliente[i]);
            lblCliente[i].setBounds(30, 120 + (i * 30), 150, 20);
            ctnVendas.add(lblCliente[i]);

            txtCliente[i] = new JTextField();
            txtCliente[i].setBounds(160, 120 + (i * 30), 150, 20);
            ctnVendas.add(txtCliente[i]);
        }

        txtCliente[0].addFocusListener(new FocusListener() {
            public void focusGained(FocusEvent evt) {

            }

            public void focusLost(FocusEvent evt) {
                try {
                    carregarCamposCli(ClientesDAO.consultarCliente(txtCliente[0].getText()));
                } catch (Exception erro) {
                    JOptionPane.showMessageDialog(null, erro.getMessage());
                }
            }
        }
        );

        for (int i = 0; i < strProduto.length; i++) {
            lblProduto[i] = new JLabel(strProduto[i]);
            lblProduto[i].setBounds(350, 75 + (i * 30), 150, 20);
            ctnVendas.add(lblProduto[i]);

            txtProduto[i] = new JTextField();
            txtProduto[i].setBounds(480, 75 + (i * 30), 150, 20);
            ctnVendas.add(txtProduto[i]);
        }

        txtProduto[0].addFocusListener(new FocusListener() {
            public void focusGained(FocusEvent evt) {

            }

            public void focusLost(FocusEvent evt) {
                try {
                    carregarCamposProd(ProdutosDAO.consultarProduto(Integer.parseInt(txtProduto[0].getText())));
                } catch (Exception erro) {
                    JOptionPane.showMessageDialog(null, erro.getMessage());
                }
            }
        }
        );

        btnAdicionar = new JButton("Adicionar", new ImageIcon("img/icons/new.png"));
        btnAdicionar.addActionListener(this);
        btnAdicionar.setBounds(350, 200, 280, 35);
        ctnVendas.add(btnAdicionar);

        tblItens = new JTable();
        scrItens = new JScrollPane(tblItens);
        mdlItens = (DefaultTableModel) tblItens.getModel();

        //Inserindo elementos no topo da tabela
        for (int i = 0; i < strTopoItens.length; i++) {
            mdlItens.addColumn(strTopoItens[i]);
        }

        scrItens.setBounds(30, 250, 600, 180);
        ctnVendas.add(scrItens);

        tblProd = new JTable();
        scrProd = new JScrollPane(tblProd);
        mdlProd = (DefaultTableModel) tblProd.getModel();

        //Inserindo elementos no topo da tabela
        for (int i = 0; i < strTopoProd.length; i++) {
            mdlProd.addColumn(strTopoProd[i]);
        }

        scrProd.setBounds(680, 75, 550, 260);
        ctnVendas.add(scrProd);

        carregarProdutos(0, "");//carregando tabela produtos

        tblProd.addMouseListener(new MouseAdapter() {
            public void mouseClicked(MouseEvent evt) {
                try {
                    int tmpCodigo = Integer.parseInt(tblProd.getValueAt(tblProd.getSelectedRow(), 0).toString());
                    ProdutosVO tmpProduto = ProdutosDAO.consultarProduto(tmpCodigo);
                    carregarCamposProd(tmpProduto);

                } catch (Exception erro) {
                    JOptionPane.showMessageDialog(null, erro.getMessage());
                }
            }
        });

        lblTotal = new JLabel("R$" + "0.00");
        lblTotal.setFont(new Font("Arial Black", Font.BOLD, 40));
        lblTotal.setBounds(1000, 330, 250, 80);
        ctnVendas.add(lblTotal);

        this.setClosable(true);
        this.setIconifiable(true);
        this.setSize(MainView.dskJanelas.getWidth(), MainView.dskJanelas.getHeight());
        this.show();
    }

    public void actionPerformed(ActionEvent evt) {
        if (evt.getSource() == btnAdicionar) {
            //adicionar item na tabela 
            adicionarItem(Integer.parseInt(txtProduto[0].getText()));
        }
    }

    public static void carregarProdutos(int tmpTipo, String tmpBusca) {
        try {

            java.util.List<ProdutosVO> lstProdutos = new ArrayList<ProdutosVO>();

            //limpando lista
            while (mdlProd.getRowCount() > 0) {
                mdlProd.removeRow(0);
            }

            //DAO >> VIEW
            lstProdutos = ProdutosDAO.listarProdutos(tmpTipo, tmpBusca);

            for (ProdutosVO tmpProduto : lstProdutos) {//para cada obj cliente dentro da lista

                String dados[] = new String[4];
                dados[0] = tmpProduto.getCodigo() + "";
                dados[1] = tmpProduto.getNome();
                dados[2] = "R$ " + tmpProduto.getValorVenda();
                dados[3] = tmpProduto.getQtdeEstoque() + "";

                mdlProd.addRow(dados);
            }

        } catch (Exception erro) {
            JOptionPane.showMessageDialog(null, erro);
        }

    }

    public static void carregarCamposProd(ProdutosVO tmpProduto) {
        txtProduto[0].setText("" + tmpProduto.getCodigo());
        txtProduto[1].setText(tmpProduto.getNome());
        txtProduto[2].setText("R$ " + tmpProduto.getValorVenda());
    }

    public static void carregarCamposCli(ClientesVO tmpCliente) {
        txtCliente[1].setText(tmpCliente.getNome());
        txtCliente[2].setText(tmpCliente.getEndereco());
        txtCliente[3].setText(tmpCliente.getBairro());
    }

    public static int adicionarItem(int tmpCodigo) {
        boolean achou = false;

        for (ItensVO tmpItem : itens) {
            if (tmpCodigo == tmpItem.getCodigoProduto()) {
                achou = true;
                int novaQtde;
                novaQtde = tmpItem.getQuantidade() + (Integer.parseInt(txtProduto[3].getText()));
                tmpItem.setQuantidade(novaQtde);
            }
        }

        if (achou == true) {
            totalVenda = 0;

            while (mdlItens.getRowCount() > 0) {
                mdlItens.removeRow(0);
            }
            for (ItensVO tmpItem : itens) {
                String dados[] = new String[5];
                dados[0] = "" + tmpItem.getCodigoProduto();

                try {
                    dados[1] = ProdutosDAO.consultarProduto(tmpItem.getCodigoProduto()).getNome();
                } catch (Exception erro) {
                    JOptionPane.showMessageDialog(null, erro.getMessage());
                }

                dados[2] = "" + tmpItem.getValorUnitario();
                dados[3] = "" + tmpItem.getQuantidade();
                dados[4] = "" + (tmpItem.getQuantidade() * tmpItem.getValorUnitario());

                mdlItens.addRow(dados);
                totalVenda += tmpItem.getQuantidade() * tmpItem.getValorUnitario();
            }
            lblTotal.setText("R$ " + totalVenda);
            return 2; //somando qtde
        } else {
            ItensVO novoItem = new ItensVO();
            String nomeProd = txtProduto[1].getText();

            novoItem.setCodigoProduto(Integer.parseInt(txtProduto[0].getText()));
            novoItem.setValorUnitario(Float.parseFloat(txtProduto[2].getText().substring(3)));
            novoItem.setQuantidade(Integer.parseInt(txtProduto[3].getText()));

            /*Adicionando na Array*/
            itens.add(novoItem);

            /*Adicionando na JTable*/
            String dados[] = new String[5];
            dados[0] = "" + novoItem.getCodigoProduto();
            dados[1] = nomeProd;
            dados[2] = "" + novoItem.getValorUnitario();
            dados[3] = "" + novoItem.getQuantidade();
            dados[4] = "" + (novoItem.getQuantidade() * novoItem.getValorUnitario());

            totalVenda += novoItem.getQuantidade() * novoItem.getValorUnitario();

            mdlItens.addRow(dados);
        }
        lblTotal.setText("R$ " + totalVenda);
        return 1; //add novo
    }

}
