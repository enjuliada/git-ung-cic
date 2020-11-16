import java.util.*;
import java.sql.*;

public class ChamadosDAO {

    public static ResultSet rsChamados;
    public static Statement stChamados;

    public static int gerarId() throws Exception {

        int id = 0;

        try {
            ConexaoDAO.abreConexao();
        } catch (Exception erro) {
            throw new Exception(erro.getMessage());
        }

        try {
            //AQUI
            String sqlId = "Select CallId from Calls order by CallId desc limit 1";
            stChamados = ConexaoDAO.connSistema.createStatement();
            rsChamados = stChamados.executeQuery(sqlId);

            if (!rsChamados.next()) {
                id = 1;
            } else {
                id = rsChamados.getInt("CallId") + 1;
            }

        } catch (Exception erro) {
            String msgErro = "Falha ao gerar novo Id para o chamado.\n";
            msgErro += "Verifique a sintaxe da instrução SQL, nome de campos e tabelas.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();
            throw new Exception(msgErro);
        }

        try {
            ConexaoDAO.fechaConexao();
        } catch (Exception erro) {
            throw new Exception(erro.getMessage());
        }

        return id;
    }

    public static void registrarChamado(ChamadosVO tmpChamado) throws Exception {
        try {
            ConexaoDAO.abreConexao();
        } catch (Exception erro) {
            throw new Exception(erro.getMessage());
        }

        try {
            //AQUI
            String sqlRegistro = "Insert into Calls(Status, TypeID, CallDate, FinishDate, Title, CustomerID, Description, Solucion, UserID) values (";
            sqlRegistro += "0, " + tmpChamado.getIdCategoria() + ",";
            sqlRegistro += "'" + tmpChamado.getDataAbertura()+ "',";
            sqlRegistro += "'" + tmpChamado.getDataFechamento()+ "',";
            sqlRegistro += "'" + tmpChamado.getTitulo()+ "',";
            sqlRegistro += "'" + tmpChamado.getIdCliente()+ "',";
            sqlRegistro += "'" + tmpChamado.getDescricao()+ "',";
            sqlRegistro += "'" + tmpChamado.getSolucao()+ "',";
            sqlRegistro += "'" + tmpChamado.getLoginUsuario()+ "')";
            
            System.out.println(sqlRegistro);
            
            stChamados = ConexaoDAO.connSistema.createStatement();
            stChamados.executeUpdate(sqlRegistro);
            
        } catch (Exception erro) {
            String msgErro = "Falha no registro do chamado.\n";
            msgErro += "Verifique a sintaxe da instrução SQL, nome de campos e tabelas.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }

        try {
            ConexaoDAO.fechaConexao();
        } catch (Exception erro) {
            throw new Exception(erro.getMessage());
        }
    }
    
    public static List<ChamadosVO> listarChamados() throws Exception{
        List<ChamadosVO> lista = new ArrayList<ChamadosVO>();
        
        try {
            ConexaoDAO.abreConexao();
        } catch (Exception erro) {
            throw new Exception(erro.getMessage());
        }
           
        try {
            //PROGRAMAR
            String sqlChamados = "Select * from Calls C, CallTypes CT where C.TypeID = CT.TypeID order by CallDate desc";
            stChamados = ConexaoDAO.connSistema.createStatement();
            rsChamados = stChamados.executeQuery(sqlChamados);
            
            while(rsChamados.next()){
                ChamadosVO tmpChamado = new ChamadosVO();
                
                tmpChamado.setId(rsChamados.getInt("CallID"));
                tmpChamado.setStatus(rsChamados.getInt("Status"));
                tmpChamado.setIdCategoria(rsChamados.getInt("TypeID"));
                tmpChamado.setDataAbertura(rsChamados.getString("CallDate"));
                tmpChamado.setDataFechamento(rsChamados.getString("FinishDate"));
                tmpChamado.setTitulo(rsChamados.getString("Title"));
                tmpChamado.setDescricao(rsChamados.getString("Description"));
                tmpChamado.setSolucao(rsChamados.getString("Solution"));
                tmpChamado.setIdCliente(rsChamados.getString("CustomerID"));
                tmpChamado.setLoginUsuario(rsChamados.getString("UserID"));
                
                lista.add(tmpChamado);
            }
                        
        } catch (Exception erro) {
            String msgErro = "Falha na listagem dos chamados.\n";
            msgErro += "Verifique a sintaxe da instrução SQL, nome de campos e tabelas.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }
              
        try {
            ConexaoDAO.fechaConexao();
        } catch (Exception erro) {
            throw new Exception(erro.getMessage());
        }
        
        return lista;
    }
    
    public static ChamadosVO consultarChamado(int tmpId) throws Exception{
        ChamadosVO tmpChamado = new ChamadosVO();        
        
        try {
            ConexaoDAO.abreConexao();
        } catch (Exception erro) {
            throw new Exception(erro.getMessage());
        }
           
        try {
            //PROGRAMAR
            String sqlChamados = "Select * from Calls C, CallTypes CT where C.CallID = " + tmpId + " and C.TypeID = CT.TypeID order by CallDate desc";
            stChamados = ConexaoDAO.connSistema.createStatement();
            rsChamados = stChamados.executeQuery(sqlChamados);
            
            if(rsChamados.next()){
                
                tmpChamado.setId(rsChamados.getInt("CallID"));
                tmpChamado.setStatus(rsChamados.getInt("Status"));
                tmpChamado.setIdCategoria(rsChamados.getInt("TypeID"));
                tmpChamado.setDataAbertura(rsChamados.getString("CallDate"));
                tmpChamado.setDataFechamento(rsChamados.getString("FinishDate"));
                tmpChamado.setTitulo(rsChamados.getString("Title"));
                tmpChamado.setDescricao(rsChamados.getString("Description"));
                tmpChamado.setSolucao(rsChamados.getString("Solution"));
                tmpChamado.setIdCliente(rsChamados.getString("CustomerID"));
                tmpChamado.setLoginUsuario(rsChamados.getString("UserID"));
            }
                        
        } catch (Exception erro) {
            String msgErro = "Falha na listagem dos chamados.\n";
            msgErro += "Verifique a sintaxe da instrução SQL, nome de campos e tabelas.\n\n";
            msgErro += "Erro Original: " + erro.getMessage();

            throw new Exception(msgErro);
        }
              
        try {
            ConexaoDAO.fechaConexao();
        } catch (Exception erro) {
            throw new Exception(erro.getMessage());
        }
        
        return tmpChamado;
    }

}//fechando classe
