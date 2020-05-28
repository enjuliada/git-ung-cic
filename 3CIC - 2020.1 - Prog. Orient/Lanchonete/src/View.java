import java.io.*;
import javax.swing.*;
import javax.swing.table.*;
import java.awt.*;
import java.awt.event.*;
import java.util.*;

public class View extends JFrame implements ActionListener {

    //1 - Declaração dos objetos
    public static Container ctnTela;
    public static ImageIcon imgLanches[], imgAcomp[];
    public static JButton btnLanches[], btnAcomp[], btnFecharPedido;

    public static JLabel lblLanches, lblAcomp, lblBanner, lblPedido, lblValorPedido, lblTotal, lblValorTotal;
    public static Font fntTexto = new Font("Verdana", Font.BOLD, 22);

    public static JTable tblItens; //tabela
    public static JScrollPane scrItens; //barra de rolagem da tabela
    public static DefaultTableModel mdlItens; //gerenciar itens da tabela

    public static float total;

    public static java.util.List<Item> lista = new ArrayList<Item>();

    public View() { //construtor

        super("Aplicação Lanchonete - 3CIC"); //barra de titulo da janela

        //2 - Construção dos objetos (inst. e config)
        ctnTela = new Container();
        ctnTela.setLayout(null);
        this.add(ctnTela); //add Container na Janela

        lblBanner = new JLabel(new ImageIcon("img/banner.jpg"));
        lblBanner.setBounds(15, 0, 450, 100);
        ctnTela.add(lblBanner);

        lblPedido = new JLabel("Valor do Pedido:");
        lblPedido.setFont(fntTexto);
        lblPedido.setBounds(15, 125, 250, 25);
        ctnTela.add(lblPedido);

        lblValorPedido = new JLabel("R$ 0,00");
        lblValorPedido.setFont(fntTexto);
        lblValorPedido.setBounds(240, 125, 150, 25);
        ctnTela.add(lblValorPedido);

        btnFecharPedido = new JButton("Fechar Pedido");
        btnFecharPedido.addActionListener(this);
        btnFecharPedido.setBounds(15, 170, 450, 40);
        ctnTela.add(btnFecharPedido);

        tblItens = new JTable();
        scrItens = new JScrollPane(tblItens);
        mdlItens = (DefaultTableModel) tblItens.getModel();

        String legenda[] = {"Item", "Qtde"};
        for (int i = 0; i < legenda.length; i++) {
            mdlItens.addColumn(legenda[i]);
        }

        scrItens.setBounds(500, 20, 280, 200);
        ctnTela.add(scrItens);

        lblLanches = new JLabel("Lanches");
        lblLanches.setBounds(360, 230, 100, 20);
        ctnTela.add(lblLanches);

        lblAcomp = new JLabel("Acompanhamentos");
        lblAcomp.setBounds(330, 380, 150, 20);
        ctnTela.add(lblAcomp);

        imgLanches = new ImageIcon[8];
        btnLanches = new JButton[8];
        imgAcomp = new ImageIcon[8];
        btnAcomp = new JButton[8];

        for (int i = 0; i < btnLanches.length; i++) {
            imgLanches[i] = new ImageIcon("img/L" + i + ".jpg");
            btnLanches[i] = new JButton(imgLanches[i]);
            btnLanches[i].addActionListener(this);
            btnLanches[i].setToolTipText(Control.objPedido.lanches[i]);
            btnLanches[i].setBounds(25 + (95 * i), 265, 80, 80);
            ctnTela.add(btnLanches[i]);

            imgAcomp[i] = new ImageIcon("img/A" + i + ".jpg");
            btnAcomp[i] = new JButton(imgAcomp[i]);
            btnAcomp[i].addActionListener(this);
            btnAcomp[i].setToolTipText(Control.objPedido.acomp[i]);
            btnAcomp[i].setBounds(25 + (95 * i), 415, 80, 80);
            ctnTela.add(btnAcomp[i]);
        }

        //3 - Configuração da Janela
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setResizable(false);
        this.setSize(800, 600);
        this.setVisible(true);

    }

    public void actionPerformed(ActionEvent evt) { //ação em botões

        for (int i = 0; i < btnLanches.length; i++) {
            if (evt.getSource() == btnLanches[i]) {

                total = Control.objPedido.atualizarPedido(1, i);
                lblValorPedido.setText("R$ " + total);
                lista = Control.objPedido.adicionarItem(i);
                atualizarTabela();

            } else if (evt.getSource() == btnAcomp[i]) {

                total = Control.objPedido.atualizarPedido(2, i);
                lblValorPedido.setText("R$ " + total);
                lista = Control.objPedido.adicionarItem(i + 8);
                atualizarTabela();

            }
        }

        if (evt.getSource() == btnFecharPedido) {

            int opc = JOptionPane.showConfirmDialog(null, "CPF na nota?","NF", JOptionPane.YES_NO_OPTION);
            
            if(opc == JOptionPane.YES_OPTION){
                String cpf = JOptionPane.showInputDialog("Informe o cpf:");
                
                gravarNota(cpf);
                
            }
            
            //limpar tabela
            while (mdlItens.getRowCount() > 0) { //limpando tabela
                mdlItens.removeRow(0);
            }
            
            lblValorPedido.setText("R$ 0.00");
        }
        
    }//fechando actionPerformed
    
    public void gravarNota(String cpf){
        
        try{
         //tentar gravar o txt   
            String textoNF = "CPF do Cliente: " + cpf + "\r\n";
            textoNF = "-----------------------------------\r\n";
            //ler a array
            
            for(Item itemAtual: lista){
                textoNF+= itemAtual.getNome() + "-----" + itemAtual.getQtde();
                textoNF += "------" + (itemAtual.getQtde()* itemAtual.getValor());
                textoNF += "\r\n";
            }
            
            textoNF += "-----------------------\r\n";
            textoNF += "Total a pagar: " + lblValorPedido.getText();
            
            //gravando arquivo
            String nomeArq = cpf + "_NF.txt";
            FileWriter arq = new FileWriter("docs\\" + nomeArq);
            PrintWriter dados = new PrintWriter(arq);
            dados.write(textoNF);
            
            arq.close();

            JOptionPane.showMessageDialog(null, "Arquivo Gerado");
            
        }catch(Exception erro){
            JOptionPane.showMessageDialog(null, "Erro ao gerar arquivo.");
        }
        
    }

    public void atualizarTabela() {

        while (mdlItens.getRowCount() > 0) { //limpando tabela
            mdlItens.removeRow(0);
        }

        for (Item itemAtual : lista) {
            String teste[] = new String[2];
            teste[0] = itemAtual.getNome();
            teste[1] = "" + itemAtual.getQtde();

            mdlItens.addRow(teste);
        }

    }

}//fechando classe
