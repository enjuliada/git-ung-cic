import java.sql.*;
import java.util.*;

public class ProdutosDAO {
    
    public static Statement stProdutos;
    public static ResultSet rsProdutos;
    
    public static ProdutosVO consultarProduto(int tmpCodigo) throws Exception{
       
        try {
            ConexaoDAO.abrirConexao();

            ProdutosVO tmpProduto = new ProdutosVO();

            String sqlConsulta = "Select * from produtos where codigo_PRODUTO = " + tmpCodigo;

            //preparando statement
            stProdutos = ConexaoDAO.connSistema.createStatement();
            rsProdutos = stProdutos.executeQuery(sqlConsulta);

            if (rsProdutos.next()) {//se houver registros

                tmpProduto.setCodigo(rsProdutos.getInt("codigo_PRODUTO"));
                tmpProduto.setNome(rsProdutos.getString("nome_PRODUTO"));
                tmpProduto.setDescricao(rsProdutos.getString("descricao_PRODUTO"));
                tmpProduto.setQtdeEstoque(rsProdutos.getInt("quantidadeEstoque_PRODUTO"));
                tmpProduto.setValorCompra(rsProdutos.getFloat("valorCompra_PRODUTO"));
                tmpProduto.setValorVenda(rsProdutos.getFloat("valorVenda_PRODUTO"));
                tmpProduto.setCodigoCategoria(rsProdutos.getInt("codigoCategoria_PRODUTO"));

                ConexaoDAO.fecharConexao();
                return tmpProduto;
            }

            ConexaoDAO.fecharConexao();
            return null; // saida 1 - return            

        } catch (Exception erro) {
            String msg = "Falha na consulta do Cliente.\n"
                    + "Verifique a sintaxe da instrução Select e nomes de campos e tabelas.\n\n"
                    + "Erro Original: " + erro.getMessage();

            throw new Exception(msg); //saida 2
        }
       
    }
    
    public static List<ProdutosVO> listarProdutos(int tmpTipo, String tmpBusca) throws Exception{
        
        try {
            ConexaoDAO.abrirConexao();

            List<ProdutosVO> lstProdutos = new ArrayList<ProdutosVO>();

            String sqlLista = "";

            if (tmpTipo == 0) {
                sqlLista = "Select * from produtos";
            } else if (tmpTipo == 1) {
                sqlLista = "Select * from produtos where codigoCategoria_PRODUTO = " + Integer.parseInt(tmpBusca);
            } else if (tmpTipo == 2) {
                sqlLista = "Select * from produtos where nome_PRODUTO like '%" + tmpBusca + "%'";
            } 

            //preparando statement
            stProdutos = ConexaoDAO.connSistema.createStatement();
            rsProdutos = stProdutos.executeQuery(sqlLista);

            while (rsProdutos.next()) {

                ProdutosVO tmpProduto = new ProdutosVO();//instanciando obj produto

                tmpProduto.setCodigo(rsProdutos.getInt("codigo_PRODUTO"));
                tmpProduto.setNome(rsProdutos.getString("nome_PRODUTO"));
                tmpProduto.setDescricao(rsProdutos.getString("descricao_PRODUTO"));
                tmpProduto.setQtdeEstoque(rsProdutos.getInt("quantidadeEstoque_PRODUTO"));
                tmpProduto.setValorCompra(rsProdutos.getFloat("valorCompra_PRODUTO"));
                tmpProduto.setValorVenda(rsProdutos.getFloat("valorVenda_PRODUTO"));
                tmpProduto.setCodigoCategoria(rsProdutos.getInt("codigoCategoria_PRODUTO"));

                lstProdutos.add(tmpProduto);
            }

            ConexaoDAO.fecharConexao();
            return lstProdutos; // saida 1 - return            

        } catch (Exception erro) {
            String msg = "Falha na listagem dos dados.\n"
                    + "Verifique a sintaxe da instrução Select e nomes de campos e tabelas.\n\n"
                    + "Erro Original: " + erro.getMessage();

            throw new Exception(msg); //saida 2
        }
        
        
    }
    
}
