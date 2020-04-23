
import java.awt.event.*; //pacote event (ActionListener)
import java.awt.*;  //pacote awt (Container)
import javax.swing.*; //pacote de elementos gráficos

public class CondView extends JFrame implements ActionListener {

    /**
     * ***** 1. DECLARAÇÃO DOS OBJETOS **********
     */
    public static Container ctnTela;

    public static JLabel lblBlocoA, lblBlocoB, lblTitulo1, lblTitulo2, lblTitulo3;
    public static JLabel lblTipo, lblProprietario, lblCaixa1, lblCaixa2;
    public static JLabel lblTotal1, lblTotal2, lblOcup, lblDisp;
    public static JLabel lblLocais, lblValorLocal;

    public static JButton btnBlocoA[][], btnBlocoB[][];

    public static JComboBox cmbTipo, cmbLocais;
    public static JTextField txtProprietario;

    public static JButton btnNovo, btnRegistrar, btnAdicionar, btnRemoverA, btnRemoverB;

    /**
     * **Declaração de Objetos/Variáveis Auxiliares ***
     */
    public static Font fntTitulos = new Font("Arial", Font.BOLD, 26);
    public static Font fntTexto = new Font("Tahoma", Font.PLAIN, 18);
    public static Font fntDados = new Font("Verdana", Font.PLAIN, 18);

    public static String vTipos[] = {"Selecione a negociação", "Locação", "Venda"};
    public static String vLocais[] = {"Selecione uma área", "Salão de Festas", "Churrasqueira", "Churrasqueira c/ piscina"};
    public static float valores[] = {0, 250, 150, 320};

    public static int tmpBloco, tmpApto, tmpTipo;
    public static String tmpProp;

    public CondView() { //método construtor

        super("Sistema de Gerenciamento de Vendas - Construtora CIC");

        /**
         * ***** 2. CONSTRUÇÃO (INSTÂNCIA) + CONFIGURAÇÃO DOS OBJETOS ********
         */
        ctnTela = new Container();
        ctnTela.setLayout(null);
        this.add(ctnTela); //add Container no JFrame

        lblTitulo1 = new JLabel("Venda/Locação");
        lblTitulo1.setFont(fntTitulos);
        lblTitulo1.setForeground(new Color(0, 0, 60));
        lblTitulo1.setBounds(20, 20, 250, 30);
        ctnTela.add(lblTitulo1);

        btnNovo = new JButton("Novo Registro");
        btnNovo.addActionListener(this);
        btnNovo.setFont(fntTexto);
        btnNovo.setForeground(new Color(60, 60, 60));
        btnNovo.setBounds(20, 60, 250, 60);
        ctnTela.add(btnNovo);

        lblTipo = new JLabel("Tipo:");
        lblTipo.setFont(fntTexto);
        lblTipo.setForeground(new Color(60, 60, 60));
        lblTipo.setBounds(20, 140, 100, 30);
        ctnTela.add(lblTipo);

        cmbTipo = new JComboBox(vTipos);
        cmbTipo.setFont(fntDados);
        cmbTipo.setForeground(new Color(60, 60, 60));
        cmbTipo.setBounds(20, 180, 250, 30);
        cmbTipo.setEnabled(false); //desabilita o campo
        ctnTela.add(cmbTipo);

        lblProprietario = new JLabel("Nome do Proprietário:");
        lblProprietario.setFont(fntTexto);
        lblProprietario.setForeground(new Color(60, 60, 60));
        lblProprietario.setBounds(20, 220, 250, 30);
        ctnTela.add(lblProprietario);

        txtProprietario = new JTextField();
        txtProprietario.setFont(fntDados);
        txtProprietario.setForeground(new Color(60, 60, 60));
        txtProprietario.setBounds(20, 260, 250, 30);
        txtProprietario.setEditable(false);
        ctnTela.add(txtProprietario);

        btnRegistrar = new JButton("Registrar Imóvel");
        btnRegistrar.addActionListener(this);
        btnRegistrar.setFont(fntTexto);
        btnRegistrar.setForeground(new Color(60, 60, 60));
        btnRegistrar.setBounds(20, 320, 250, 45);
        btnRegistrar.setEnabled(false);
        ctnTela.add(btnRegistrar);

        lblTitulo2 = new JLabel("Áreas Adicionais");
        lblTitulo2.setFont(fntTitulos);
        lblTitulo2.setForeground(new Color(0, 0, 60));
        lblTitulo2.setBounds(20, 380, 250, 30);
        ctnTela.add(lblTitulo2);

        lblLocais = new JLabel("Áreas disponíveis:");
        lblLocais.setFont(fntTexto);
        lblLocais.setForeground(new Color(0, 0, 60));
        lblLocais.setBounds(20, 420, 250, 30);
        ctnTela.add(lblLocais);

        cmbLocais = new JComboBox(vLocais);
        cmbLocais.setFont(fntDados);
        cmbLocais.setForeground(new Color(60, 60, 60));
        cmbLocais.setBounds(20, 460, 250, 30);
        ctnTela.add(cmbLocais);

        //o que vai acontecer ao 'selecionar item' na lista
        cmbLocais.addItemListener(new ItemListener() {
            public void itemStateChanged(ItemEvent evt) {
                lblValorLocal.setText("Valor: R$ " + SistemaControl.objDados.getValorLocal(
                        cmbLocais.getSelectedIndex()));
            }
        }
        );

        lblValorLocal = new JLabel("Valor: R$ 0,00");
        lblValorLocal.setFont(fntDados);
        lblValorLocal.setForeground(new Color(0, 0, 60));
        lblValorLocal.setBounds(20, 500, 250, 30);
        ctnTela.add(lblValorLocal);

        btnAdicionar = new JButton("Solicitar área");
        btnAdicionar.addActionListener(this);
        btnAdicionar.setFont(fntTexto);
        btnAdicionar.setForeground(new Color(60, 60, 60));
        btnAdicionar.setBounds(20, 540, 250, 45);
        ctnTela.add(btnAdicionar);

        lblTitulo3 = new JLabel("Relatórios");
        lblTitulo3.setFont(fntTitulos);
        lblTitulo3.setForeground(new Color(0, 0, 60));
        lblTitulo3.setBounds(20, 620, 250, 30);
        ctnTela.add(lblTitulo3);

        lblDisp = new JLabel("Aptos. Disponíveis: " + 120);
        lblDisp.setFont(fntDados);
        lblDisp.setForeground(new Color(0, 0, 60));
        lblDisp.setBounds(20, 660, 250, 30);
        ctnTela.add(lblDisp);

        lblOcup = new JLabel("Aptos. Ocupados: " + 0);
        lblOcup.setFont(fntDados);
        lblOcup.setForeground(new Color(0, 0, 60));
        lblOcup.setBounds(20, 700, 250, 30);
        ctnTela.add(lblOcup);

        lblCaixa1 = new JLabel("Estimativa Mensal:");
        lblCaixa1.setFont(fntDados);
        lblCaixa1.setForeground(new Color(0, 0, 60));
        lblCaixa1.setBounds(20, 740, 250, 30);
        ctnTela.add(lblCaixa1);

        lblTotal1 = new JLabel("R$ 0,00");
        lblTotal1.setFont(fntDados);
        lblTotal1.setForeground(new Color(0, 0, 60));
        lblTotal1.setBounds(200, 740, 250, 30);
        ctnTela.add(lblTotal1);

        lblCaixa2 = new JLabel("Total em Caixa:");
        lblCaixa2.setFont(fntDados);
        lblCaixa2.setForeground(new Color(0, 0, 60));
        lblCaixa2.setBounds(20, 780, 250, 30);
        ctnTela.add(lblCaixa2);

        lblTotal2 = new JLabel("R$ 0,00");
        lblTotal2.setFont(fntDados);
        lblTotal2.setForeground(new Color(0, 0, 60));
        lblTotal2.setBounds(200, 780, 250, 30);
        ctnTela.add(lblTotal2);

        lblBlocoA = new JLabel("Bloco A");
        lblBlocoA.setFont(fntTitulos);
        lblBlocoA.setForeground(new Color(0, 0, 60));
        lblBlocoA.setBounds(350, 60, 150, 30);
        ctnTela.add(lblBlocoA);

        lblBlocoB = new JLabel("Bloco B");
        lblBlocoB.setFont(fntTitulos);
        lblBlocoB.setForeground(new Color(0, 0, 60));
        lblBlocoB.setBounds(820, 60, 150, 30);
        ctnTela.add(lblBlocoB);

        int xInicialA = 350;
        int xInicialB = 820;
        int yInicial = 100;

        btnBlocoA = new JButton[10][6];
        btnBlocoB = new JButton[10][6];

        for (int i = 9; i >= 0; i--) {
            for (int j = 0; j < 6; j++) {
                btnBlocoA[i][j] = new JButton(i + "" + (j + 1));
                btnBlocoA[i][j].addActionListener(this);
                btnBlocoA[i][j].setBackground(new Color(0, 255, 150));
                btnBlocoA[i][j].setEnabled(false);//desabilitando botoes
                btnBlocoA[i][j].setBounds(xInicialA, yInicial, 60, 60);
                ctnTela.add(btnBlocoA[i][j]);
                xInicialA += 70;

                btnBlocoB[i][j] = new JButton(i + "" + (j + 1));
                btnBlocoB[i][j].addActionListener(this);
                btnBlocoB[i][j].setBackground(new Color(0, 255, 150));
                btnBlocoB[i][j].setEnabled(false);
                btnBlocoB[i][j].setBounds(xInicialB, yInicial, 60, 60);
                ctnTela.add(btnBlocoB[i][j]);
                xInicialB += 70;
            }
            xInicialA = 350;
            xInicialB = 820;
            yInicial += 70;
        }

        btnRemoverA = new JButton("Remover Proprietário (A)");
        btnRemoverA.addActionListener(this);
        btnRemoverA.setEnabled(false);
        btnRemoverA.setFont(fntTexto);
        btnRemoverA.setBounds(350, 800, 410, 40);
        ctnTela.add(btnRemoverA);

        btnRemoverB = new JButton("Remover Proprietário (B)");
        btnRemoverB.addActionListener(this);
        btnRemoverB.setEnabled(false);
        btnRemoverB.setFont(fntTexto);
        btnRemoverB.setBounds(820, 800, 410, 40);
        ctnTela.add(btnRemoverB);

        /**
         * *** 3. CONFIGURAÇÕES DA JANELA ******
         */
        this.setLocation(340, 80);
        //this.setLocationRelativeTo(null); - centraliza a janela
        this.setResizable(false);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(1280, 900);
        this.setVisible(true);

    } //fechando método construtor

    public void actionPerformed(ActionEvent evt) {
        //Programação dos botões

        for (int i = 0; i < 10; i++) {
            for (int j = 0; j < 6; j++) {
                if (evt.getSource() == btnBlocoA[i][j]) {
                    //Selecionado apto Bl. A
                    tmpBloco = 1;
                    tmpApto = Integer.parseInt(i + "" + (j + 1));
                    btnBlocoA[i][j].setBackground(new Color(0, 200, 200));
                    habilitarCampos(1, false);
                    habilitarCampos(2, true);
                    JOptionPane.showMessageDialog(null, "Preencha os dados de registro.");

                } else if (evt.getSource() == btnBlocoB[i][j]) {
                    //Selecionado apto Bl. B
                    tmpBloco = 2;
                    tmpApto = Integer.parseInt(i + "" + (j + 1));
                    btnBlocoB[i][j].setBackground(new Color(0, 200, 200));
                    habilitarCampos(1, false);
                    habilitarCampos(2, true);
                    JOptionPane.showMessageDialog(null, "Preencha os dados de registro.");
                }
            } //for i
        }//for j

        if (evt.getSource() == btnNovo) {
            habilitarCampos(1, true);
            JOptionPane.showMessageDialog(null, "Selecione um apartamento");

        } else if (evt.getSource() == btnRegistrar) {

            tmpTipo = cmbTipo.getSelectedIndex(); //pega o índice do elemento selecionado
            tmpProp = txtProprietario.getText();

            int l, c;
            if (tmpApto < 10) {
                l = 0;
                c = tmpApto - 1;
            } else {
                l = tmpApto / 10;
                c = tmpApto - (l * 10) - 1;
            }

            Color cor = null;
            if (tmpTipo == 1) {
                cor = new Color(255, 165, 0);
            } else if (tmpTipo == 2) {
                cor = new Color(255, 69, 0);
            }

            if (tmpBloco == 1) {
                btnBlocoA[l][c].setBackground(cor);
                btnRemoverA.setEnabled(true);
            } else if (tmpBloco == 2) {
                btnBlocoB[l][c].setBackground(cor);
                btnRemoverB.setEnabled(true);
            }

            SistemaControl.objDados.registrarImovel(tmpTipo, tmpBloco, tmpApto, tmpProp);

            atualizarRelatorio();

            habilitarCampos(1, false);
            habilitarCampos(2, false);

        } else if (evt.getSource() == btnRemoverA) {
            int numero = Integer.parseInt(JOptionPane.showInputDialog(
                    "Informe o número do Apto. (Bloco A)"));

            int opcao = JOptionPane.showConfirmDialog(null,
                    "Deseja remover o proprietário da unidade A-" + numero + "?", "Remover",
                    JOptionPane.YES_NO_OPTION);

            if (opcao == JOptionPane.YES_OPTION) {
                int l, c;
                if (numero < 10) { //3
                    l = 0;
                    c = numero - 1;
                } else { //94
                    l = numero / 10;
                    c = numero - (l * 10) - 1;
                }

                boolean status = SistemaControl.objDados.removerProp(1, l, c);

                if (status == true) {
                    JOptionPane.showMessageDialog(null, "Apto. " + numero + " está disponível.");
                    btnBlocoA[l][c].setBackground(new Color(0, 255, 150));
                    atualizarRelatorio();
                } else {
                    JOptionPane.showMessageDialog(null, "O apto. já encontra-se vazio.");
                }

            }

        } else if (evt.getSource() == btnRemoverB) {
            int numero = Integer.parseInt(JOptionPane.showInputDialog(
                    "Informe o número do Apto. (Bloco B)"));

            int opcao = JOptionPane.showConfirmDialog(null,
                    "Deseja remover o proprietário da unidade B-" + numero + "?", "Remover",
                    JOptionPane.YES_NO_OPTION);

            if (opcao == JOptionPane.YES_OPTION) {
                int l, c;
                if (numero < 10) { //3
                    l = 0;
                    c = numero - 1;
                } else { //94
                    l = numero / 10;
                    c = numero - (l * 10) - 1;
                }

                boolean status = SistemaControl.objDados.removerProp(2, l, c);

                if (status == true) {
                    JOptionPane.showMessageDialog(null, "Apto. " + numero + " está disponível.");
                    btnBlocoB[l][c].setBackground(new Color(0, 255, 150));
                    atualizarRelatorio();
                } else {
                    JOptionPane.showMessageDialog(null, "O apto. já encontra-se vazio.");
                }
            }

        } else if (evt.getSource() == btnAdicionar) {

            int area = cmbLocais.getSelectedIndex(); //pegando o indice da opção selecionada na combo

            if (area == 0) {
                JOptionPane.showMessageDialog(null, "Selecione uma área.");
            } else {
                //Reserva do espaço
                //pegando o texto do indice selecionado
                String nomeArea = cmbLocais.getSelectedItem().toString();

                SistemaControl.objDados.reservarArea(area);

                JOptionPane.showMessageDialog(null, nomeArea + " reservada.");
                atualizarRelatorio();

            }

        }

    }//fechando actionPerformed

    public void habilitarCampos(int tmpParte, boolean tmpStatus) {
        btnNovo.setEnabled(!tmpStatus);

        if (tmpParte == 1) {
            for (int i = 0; i < 10; i++) {
                for (int j = 0; j < 6; j++) {
                    btnBlocoA[i][j].setEnabled(tmpStatus);
                    btnBlocoB[i][j].setEnabled(tmpStatus);
                }
            }
        } else if (tmpParte == 2) {
            cmbTipo.setEnabled(tmpStatus);
            txtProprietario.setEditable(tmpStatus);
            btnRegistrar.setEnabled(tmpStatus);
        }

    } //fechando habilitarCampos

    public void atualizarRelatorio() {
        lblOcup.setText("Aptos. Ocupados: " + (int) SistemaControl.objDados.getDados(1));
        lblDisp.setText("Aptos. Disponíveis: " + (int) SistemaControl.objDados.getDados(2));
        lblTotal1.setText("" + SistemaControl.objDados.getDados(3));
        lblTotal2.setText("" + SistemaControl.objDados.getDados(4));

    }

} //fechando class
