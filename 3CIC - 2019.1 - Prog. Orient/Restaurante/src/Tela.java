import java.io.*;// Comunicação com dispositivos (disco)
import javax.swing.*; //Pacote de elementos graficos (Jrame)
import java.awt.*; //Dimension
import java.awt.event.*;//ActionListener
import java.text.DecimalFormat;
import javax.swing.table.*;//DefaultTableModel

//Classe Tela herda caracteristicas da classe JFrame
public class Tela extends JFrame implements ActionListener {

    public static int idAtendimento = 1;    
    
    //declaração publica dos objetos   
    public static Font fntLabels = new Font("Tahoma", Font.BOLD, 24);
    public static Font fntCxTexto = new Font("Verdana", Font.PLAIN, 22);

    //Declaração MENU
    public static JMenuBar mbrTela;
    public static JMenu mnuSistema;
    public static JMenuItem mniAlterar, mniSair;
    
    public static Container ctnTela;

    public static JLabel lblBanner, lblVRodizio, lblQPessoas,
            lblTRodizio, lblAcompanhamentos, lblServicos,
            lblEstacionamento, lblTotal, lblBebidas, lblSobremesas;

    public static JTextField txtVRodizio, txtQPessoas, txtTRodizio,
            txtAcompanhamentos, txtServicos, txtTotal;

    public static JButton btnAdd, btnFecharPedido,
            btnBebidas[], btnSobremesas[];

    public static ImageIcon imgBanner, imgBebidas[], imgSobremesas[];

    public static JComboBox cmbEstacionamento;

    public static JTable tblItens;
    public static JScrollPane scrItens;
    public static DefaultTableModel mdlItens;

    public static DecimalFormat fmtMoeda;

    public Tela() { //método construtor

        super("Sistema Gerenciador de Restaurante - CIC UNG");

        //Construção e Configuração do menu
        mbrTela = new JMenuBar();
        this.setJMenuBar(mbrTela); //add barra de menu no JFRame
        
        mnuSistema = new JMenu("Sistema");
        mnuSistema.setMnemonic('s');
        mbrTela.add(mnuSistema); // add menu na barra
        
        mniAlterar = new JMenuItem("Alterar valor do rodízio");
        mniAlterar.addActionListener(this);
        mnuSistema.add(mniAlterar); //add alterar no menu sistema
        
        mnuSistema.add(new JSeparator());//criando divisao entre itens
        
        mniSair = new JMenuItem("Fechar Programa");
        mniSair.addActionListener(this);
        mnuSistema.add(mniSair);
                
        //instanciando objeto para comunicação entre Tela e Pedido
        //Comunicação entre camada VIEW -> VO (atributos)
        Control.objComanda = new Pedido((float) 49.9);

        //Construção e configuração
        ctnTela = new Container();//instanciando
        ctnTela.setLayout(null);//configurando layout
        this.add(ctnTela);//add container na janela

        imgBanner = new ImageIcon("img/banner.jpg");
        lblBanner = new JLabel(imgBanner);
        lblBanner.setBounds(0, 0, 1360, 180);//posicionamento do objeto(X,Y,Larg,Alt)
        ctnTela.add(lblBanner); //add banner no container

        lblVRodizio = new JLabel("Valor do Rodízio:");
        lblVRodizio.setFont(fntLabels);
        lblVRodizio.setBounds(15, 220, 250, 30);
        ctnTela.add(lblVRodizio);

        lblQPessoas = new JLabel("Qtde. de Pessoas:");
        lblQPessoas.setFont(fntLabels);
        lblQPessoas.setBounds(15, 290, 250, 30);
        ctnTela.add(lblQPessoas);

        lblTRodizio = new JLabel("Total do Rodízio:");
        lblTRodizio.setFont(fntLabels);
        lblTRodizio.setBounds(15, 360, 250, 30);
        ctnTela.add(lblTRodizio);

        lblAcompanhamentos = new JLabel("Acompanhamentos:");
        lblAcompanhamentos.setFont(fntLabels);
        lblAcompanhamentos.setBounds(15, 430, 250, 30);
        ctnTela.add(lblAcompanhamentos);

        lblServicos = new JLabel("Serviços:");
        lblServicos.setFont(fntLabels);
        lblServicos.setBounds(15, 500, 250, 30);
        ctnTela.add(lblServicos);

        lblEstacionamento = new JLabel("Estacionamento:");
        lblEstacionamento.setFont(fntLabels);
        lblEstacionamento.setBounds(15, 570, 250, 30);
        ctnTela.add(lblEstacionamento);

        lblTotal = new JLabel("Total a pagar:");
        lblTotal.setFont(fntLabels);
        lblTotal.setBounds(15, 640, 250, 30);
        ctnTela.add(lblTotal);

        txtVRodizio = new JTextField();
        txtVRodizio.setEditable(false);
        txtVRodizio.setFont(fntCxTexto);
        txtVRodizio.setBounds(240, 220, 200, 30);
        ctnTela.add(txtVRodizio);

        txtQPessoas = new JTextField();
        txtQPessoas.setEditable(false);
        txtQPessoas.setFont(fntCxTexto);
        txtQPessoas.setBounds(240, 290, 100, 30);
        ctnTela.add(txtQPessoas);

        txtTRodizio = new JTextField();
        txtTRodizio.setEditable(false);
        txtTRodizio.setFont(fntCxTexto);
        txtTRodizio.setBounds(240, 360, 200, 30);
        ctnTela.add(txtTRodizio);

        txtAcompanhamentos = new JTextField();
        txtAcompanhamentos.setEditable(false);
        txtAcompanhamentos.setFont(fntCxTexto);
        txtAcompanhamentos.setBounds(270, 430, 170, 30);
        ctnTela.add(txtAcompanhamentos);

        txtServicos = new JTextField();
        txtServicos.setEditable(false);
        txtServicos.setFont(fntCxTexto);
        txtServicos.setBounds(160, 500, 280, 30);
        ctnTela.add(txtServicos);

        txtTotal = new JTextField();
        txtTotal.setEditable(false);
        txtTotal.setFont(fntCxTexto);
        txtTotal.setBounds(220, 640, 220, 30);
        ctnTela.add(txtTotal);

        String op[] = {"Não", "Sim"};
        cmbEstacionamento = new JComboBox(op);
        cmbEstacionamento.setFont(fntCxTexto);
        cmbEstacionamento.setBounds(230, 570, 210, 30);
        ctnTela.add(cmbEstacionamento);

        //Tratamento do 'click' na combo
        cmbEstacionamento.addItemListener(new ItemListener() {
            public void itemStateChanged(ItemEvent evt) {
                if (cmbEstacionamento.getSelectedIndex() == 1) {
                    Control.objComanda.stEstacionamento = true;
                }else{
                    Control.objComanda.stEstacionamento = false;
                }                
                Control.objComanda.atualizarValores();
                carregarDados();                
            }
        }
        );

        //instanciando vetores de botoes (bebidas e sobremesas)
        btnBebidas = new JButton[8];
        btnSobremesas = new JButton[8];

        //instanciando e configurando cada botao dentro dos vetores
        for (int i = 0; i < btnBebidas.length; i++) {

            btnBebidas[i] = new JButton(new ImageIcon("img/b" + i + ".png"));
            /**
             * **
             */
            btnBebidas[i].addActionListener(this);
            btnBebidas[i].setToolTipText(Control.objComanda.sBebidas[i] + " - R$ " + Control.objComanda.vBebidas[i]);
            btnBebidas[i].setBackground(Color.white);

            btnSobremesas[i] = new JButton(new ImageIcon("img/s" + i + ".png"));
            /**
             * **
             */
            btnSobremesas[i].addActionListener(this);
            btnSobremesas[i].setToolTipText(Control.objComanda.sSobremesas[i] + " - R$ " + Control.objComanda.vSobremesas[i]);
            btnSobremesas[i].setBackground(Color.white);

            //posicionando botoes
            if (i < 4) {
                btnBebidas[i].setBounds(850 + (i * 120), 200, 100, 100);
                btnSobremesas[i].setBounds(850 + (i * 120), 450, 100, 100);
            } else {
                btnBebidas[i].setBounds(850 + ((i - 4) * 120), 320, 100, 100);
                btnSobremesas[i].setBounds(850 + ((i - 4) * 120), 570, 100, 100);
            }

            ctnTela.add(btnBebidas[i]);
            ctnTela.add(btnSobremesas[i]);

        }//fechando for

        tblItens = new JTable();//instanciando table
        scrItens = new JScrollPane(tblItens);//instanciando scroll e vinculando à tabela
        mdlItens = (DefaultTableModel) tblItens.getModel();

        //add tabela na janela (através do scrollPane)
        scrItens.setBounds(470, 220, 350, 400);
        ctnTela.add(scrItens);

        //montando topo da tabela
        String sTopo[] = {"Item", "Quantidade"};
        for (int i = 0; i < sTopo.length; i++) {
            mdlItens.addColumn(sTopo[i]);
        }

        btnAdd = new JButton("+");
        btnAdd.addActionListener(this);
        btnAdd.setFont(fntLabels);
        btnAdd.setBounds(350, 290, 90, 30);
        ctnTela.add(btnAdd);

        btnFecharPedido = new JButton("Fechar Pedido");
        btnFecharPedido.addActionListener(this);
        btnFecharPedido.setFont(fntLabels);
        btnFecharPedido.setBounds(470, 640, 350, 30);
        ctnTela.add(btnFecharPedido);

        //chamando metodo de preenchimento dos campos
        Control.objComanda.atualizarValores();
        carregarDados();

        //encerra processo da VJM ao fechar a janela
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(montarTela().width, montarTela().height - 35);//dimensoes da janela
        this.setResizable(false);//bloqueando o dimensionamento
        this.setVisible(true); //exibe a janela

    }//fechando construtor

    public void actionPerformed(ActionEvent evt) {

        //método getSource recebe o nome do botao 'clicado'
        
        if(evt.getSource() == mniSair){
            System.exit(0);//encerra VJM            
        }
        
        if (evt.getSource() == mniAlterar){
         float novoValor = Float.parseFloat(
                           JOptionPane.showInputDialog(
                           "Entre com o novo valor: "));
         
         Control.objComanda.vRodizio = novoValor;
         Control.objComanda.atualizarValores();
         carregarDados();
         
         
        }
                
        if (evt.getSource() == btnAdd) {
            Control.objComanda.qtdePessoas++;
            Control.objComanda.atualizarValores();
            carregarDados();
        }

        for (int i = 0; i < btnBebidas.length; i++) {
            if (evt.getSource() == btnBebidas[i]) {
                Control.objComanda.adicionarAcompanhamento(1, i);
                Control.objComanda.atualizarValores();
                carregarDados();
            } else if (evt.getSource() == btnSobremesas[i]) {
                Control.objComanda.adicionarAcompanhamento(2, i);
                Control.objComanda.atualizarValores();
                carregarDados();
            }
            atualizarTabela();
        }//fechando for   
        
        if(evt.getSource() == btnFecharPedido){
            int resp = JOptionPane.showConfirmDialog(null,"Deseja gerar nota?", "NF", JOptionPane.YES_NO_OPTION);
            
            if(resp == JOptionPane.YES_OPTION){
                //GRAVAR NOTA               
                String cpf = JOptionPane.showInputDialog(
                    "Informe o cpf:");
                gravarNota(cpf);
           }
            
           idAtendimento++; 
           zerarCampos();
        }
        
    }//fechando actionPerformed

    public static Dimension montarTela() {

        //Classe ToolKit - acessa configurações do sistema
        Toolkit info = Toolkit.getDefaultToolkit();
        Dimension resolucao = info.getScreenSize();//acessando dimensoes da tela
        return resolucao;//retornando resolução
    } //fechando montarTela

    public static void carregarDados() {
        //Preencher cada campo com sua respectiva informação
        txtVRodizio.setText("R$ " + Control.objComanda.vRodizio);
        txtQPessoas.setText("" + Control.objComanda.qtdePessoas);
        txtTRodizio.setText("R$ " + Control.objComanda.vParcial);
        txtAcompanhamentos.setText("R$ " + Control.objComanda.vAcompanhamentos);
        txtServicos.setText("R$ " + Control.objComanda.vServicos);
        txtTotal.setText("R$ " + Control.objComanda.vTotal);

    }

    public static void atualizarTabela() {

        //limpar tabela antes de add
        while (mdlItens.getRowCount() > 0) {
            mdlItens.removeRow(0);
        }

        //Para cada item encontrado na lista de acompanhamentos
        for (Acompanhamento item : Control.objComanda.lista) {

            String dados[] = new String[2];
            dados[0] = item.getNome();
            dados[1] = "" + item.getQuantidade();

            mdlItens.addRow(dados);

        }//fechando for        
    }//fechando atualizarTabela
    
    
    public static void gravarNota(String tmpCpf){
        
        String texto="";
        texto += "#### RESTAURANTE CIC - 3º SEMESTRE ####\r\n";
        texto += "Av. Guarulhos, 353 - Centro\r\n";
        texto += "Tel: (11)95241-2545\r\n\r\n";
        texto += "******** Dados do pedido *********\r\n\r\n";
        texto += "Valor do Rodízio: R$ " + Control.objComanda.vRodizio + "\r\n";
        texto += "Pessoas: " + Control.objComanda.qtdePessoas + "\r\n";
        texto += "Sub-Total: " + Control.objComanda.vParcial + "\r\n";
        
        for(Acompanhamento item:Control.objComanda.lista){
            texto+= item.getNome()+
                    " ------ " + item.getQuantidade() +
                    " ------ " + (item.getQuantidade() * item.getValor()) +
                    "\r\n";
        }//fechando for
        
        texto += "\r\n";
        texto += "Acompanhamentos: " + Control.objComanda.vAcompanhamentos + "\r\n";
        texto += "Serviços: " + Control.objComanda.vServicos + "\r\n";
        
        if(Control.objComanda.stEstacionamento){
            texto+="Estacionamento: SIM (R$ 15,00) \r\n\r\n";
        } else{
            texto+="Estacionamento: NÃO \r\n\r\n";
        }
        
        texto+="TOTAL A PAGAR: R$" + Control.objComanda.vTotal + "\r\n\r\n\r\n";
        texto+="AGRADECEMOS A PREFERÊNCIA - VOLTE SEMPRE!";
        
        //gravação e escrita do arquivo        
        try{
            
            String nomeArquivo = "NF" + idAtendimento + "_" + tmpCpf + ".txt";
            //Gravando o arquivo no local e nome especificados
            FileWriter arquivo = new FileWriter("docs\\" + nomeArquivo);
            //Escrevendo conteudo da nota no arquivo instanciado acima
            PrintWriter conteudo = new PrintWriter(arquivo);
            conteudo.write(texto);//escrevendo texto no arquivo
            //Salvando e fechando o arquivo texto
            arquivo.close();
            
            JOptionPane.showMessageDialog(null, "Arquivo gerado.");
            
            //abrindo bloco de notas com o arquivo
            Runtime.getRuntime().exec("notepad  C:\\Users\\280104398\\Documents\\NetBeansProjects\\Restaurante\\docs\\" + nomeArquivo);
           
        }catch(Exception erro){
            JOptionPane.showMessageDialog(null, "Falha na gravação do arquivo.\nErro original:" 
                                                + erro.getMessage());        
        }
        
    }//fechando gravarNota
    
    public static void zerarCampos(){        
        //limpar ArrayList
        Control.objComanda.lista.clear();
        
        //limpar Tabela
        while(mdlItens.getRowCount() > 0){
            mdlItens.removeRow(0);
        }
        
        //Zerar valores e Caixas de texto     
        Control.objComanda.vRodizio = (float) 49.9;
        Control.objComanda.qtdePessoas = 1;
        Control.objComanda.vParcial = 0;
        Control.objComanda.vAcompanhamentos = 0;
        Control.objComanda.vServicos = 0;
        Control.objComanda.stEstacionamento = false;
        Control.objComanda.vTotal = 0;
        Control.objComanda.atualizarValores();
        
        cmbEstacionamento.setSelectedIndex(0);//voltando pra nao        
        carregarDados();
        
    }

}//fechando classe
