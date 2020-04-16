
public class CondVO {

    //declaração dos atributos
    private int blocoA[][] = new int[10][6];
    private int blocoB[][] = new int[10][6];

    private String propA[][] = new String[10][6];
    private String propB[][] = new String[10][6];

    private int ocupados, disponiveis;
    private float mensal, caixa, valorCond;

    private float vLocais[] = {0, 250, 150, 320};
    private float vVenda[] = {300000, 315000, 320000, 330000};
    private float vAluguel[] = {1800, 2000, 2200, 2500};

    public CondVO() {

        //definindo situação inicial dos aptos.    
        for (int i = 0; i < 10; i++) {
            for (int j = 0; i < 6; i++) {
                blocoA[i][j] = 0; //disponiveis
                blocoB[i][j] = 0; //disponiveis                
                propA[i][j] = "";
                propB[i][j] = "";
            }//for j
        }//for i

        valorCond = 500;
        ocupados = 0;
        disponiveis = 120;
        mensal = 0;
        caixa = 0;

    }//construtor

    public boolean registrarImovel(int tmpStatus, int tmpBloco, int tmpApto, String tmpNome) {

        //identificando apto
        int dezena = (int) tmpApto / 10; //4
        int unidade = tmpApto - (dezena * 10) - 1; //43-(4*10)

        if (tmpBloco == 1) {
            //BLOCO A

            if (blocoA[dezena][unidade] == 0) {//se estiver livre
                blocoA[dezena][unidade] = tmpStatus; //ocupando
                propA[dezena][unidade] = tmpNome; //registrando prop.

                mensal += valorCond;

                if (tmpStatus == 1) { //aluguel
                    if (dezena <= 3) {
                        mensal += vAluguel[0];
                    } else if (dezena <= 6) {
                        mensal += vAluguel[1];
                    } else if (dezena <= 8) {
                        mensal += vAluguel[2];
                    } else if (dezena <= 9) {
                        mensal += vAluguel[3];
                    }
                } else { //venda
                    if (dezena <= 3) {
                        caixa += vVenda[0];
                    } else if (dezena <= 6) {
                        caixa += vVenda[1];
                    } else if (dezena <= 8) {
                        caixa += vVenda[2];
                    } else if (dezena <= 9) {
                        caixa += vVenda[3];
                    }
                }
                
                ocupados++;
                disponiveis--;
                
                return true;
            } else {
                return false;
            }

        } else {
            //Bloco B
            if (blocoB[dezena][unidade] == 0) {//se estiver livre
                blocoB[dezena][unidade] = tmpStatus; //ocupando
                propB[dezena][unidade] = tmpNome; //registrando prop.

                mensal += valorCond;

                if (tmpStatus == 1) { //aluguel
                    if (dezena <= 3) {
                        mensal += vAluguel[0];
                    } else if (dezena <= 6) {
                        mensal += vAluguel[1];
                    } else if (dezena <= 8) {
                        mensal += vAluguel[2];
                    } else if (dezena <= 9) {
                        mensal += vAluguel[3];
                    }
                } else { //venda
                    if (dezena <= 3) {
                        caixa += vVenda[0];
                    } else if (dezena <= 6) {
                        caixa += vVenda[1];
                    } else if (dezena <= 8) {
                        caixa += vVenda[2];
                    } else if (dezena <= 9) {
                        caixa += vVenda[3];
                    }
                }
                
                ocupados++;
                disponiveis--;
                
                return true;
            } else {
                return false;
            }
        }

    }//fechando registrarImovel

    public float getDados(int tmpTipo) {
        if (tmpTipo == 1) {
            return (float) ocupados;
        } else if (tmpTipo == 2) {
            return (float) disponiveis;
        } else if (tmpTipo == 3) {
            return mensal;
        } else if (tmpTipo == 4) {
            return caixa;
        }
        
        return 0;
    }

}//fechando class
