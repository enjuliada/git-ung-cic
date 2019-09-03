import java.sql.*;
import java.util.*; //List

public class ClientesDAO {
    
    public static Statement stClientes; //executa SQL
    public static ResultSet rsClientes; //armazena result do select
    
    public static void cadastrarCliente() throws Exception{
        
    }
    
    public static ClientesVO consultarCliente(String tmpCpf) throws Exception{
        
         try{
            ConexaoDAO.abrirConexao();
            
            ClientesVO tmpCliente = new ClientesVO();
            
            String sqlConsulta = "Select * from clientes where cpf_CLIENTE like '" + tmpCpf + "'";
            
            //preparando statement
            stClientes = ConexaoDAO.connSistema.createStatement();
            rsClientes = stClientes.executeQuery(sqlConsulta);
            
            if(rsClientes.next()){//se houver registros
                
                tmpCliente.setCpf(rsClientes.getString("cpf_CLIENTE"));
                tmpCliente.setNome(rsClientes.getString("nome_CLIENTE"));
                tmpCliente.setDataNascimento(rsClientes.getString("dataNascimento_CLIENTE"));
                tmpCliente.setEndereco(rsClientes.getString("endereco_CLIENTE"));
                tmpCliente.setBairro(rsClientes.getString("bairro_CLIENTE"));
                tmpCliente.setCidade(rsClientes.getString("cidade_CLIENTE"));
                tmpCliente.setTelefone(rsClientes.getString("telefone_CLIENTE"));
                tmpCliente.setEmail(rsClientes.getString("email_CLIENTE"));
                tmpCliente.setFoto(rsClientes.getString("foto_CLIENTE"));
                tmpCliente.setStatus(rsClientes.getInt("status_CLIENTE"));
                
                ConexaoDAO.fecharConexao();
                return tmpCliente;
            }
            
            ConexaoDAO.fecharConexao();
            return null; // saida 1 - return            
            
        }catch(Exception erro){
            String msg = "Falha na consulta do Cliente.\n"
                       + "Verifique a sintaxe da instrução Select e nomes de campos e tabelas.\n\n"
                       + "Erro Original: " + erro.getMessage(); 
            
            throw new Exception(msg); //saida 2
        }                     
        
    }//fechando consultar
    
    public static List<ClientesVO> listarClientes(int tmpTipo, String tmpBusca) throws Exception{
                
        try{
            ConexaoDAO.abrirConexao();
            
            List<ClientesVO> lstClientes = new ArrayList<ClientesVO>();
            
            String sqlLista = "";
            
            if (tmpTipo == 0){
                sqlLista = "Select * from clientes";
                
            }else if (tmpTipo == 1){
                sqlLista = "Select * from clientes where bairro_CLIENTE like '" + tmpBusca + "'";
                
            }else if(tmpTipo == 2){
                sqlLista = "Select * from clientes where nome_CLIENTE like '%" + tmpBusca + "%'";
                
            }else if (tmpTipo == 3){
                sqlLista = "Select * from clientes where nome_CLIENTE like '" + tmpBusca + "%'";
            }
            
            //preparando statement
            stClientes = ConexaoDAO.connSistema.createStatement();
            rsClientes = stClientes.executeQuery(sqlLista);
            
            while(rsClientes.next()){
                
                ClientesVO tmpCliente = new ClientesVO();//instanciando obj Cliente
                
                tmpCliente.setCpf(rsClientes.getString("cpf_CLIENTE"));
                tmpCliente.setNome(rsClientes.getString("nome_CLIENTE"));
                tmpCliente.setDataNascimento(rsClientes.getString("dataNascimento_CLIENTE"));
                tmpCliente.setEndereco(rsClientes.getString("endereco_CLIENTE"));
                tmpCliente.setBairro(rsClientes.getString("bairro_CLIENTE"));
                tmpCliente.setCidade(rsClientes.getString("cidade_CLIENTE"));
                tmpCliente.setTelefone(rsClientes.getString("telefone_CLIENTE"));
                tmpCliente.setEmail(rsClientes.getString("email_CLIENTE"));
                tmpCliente.setFoto(rsClientes.getString("foto_CLIENTE"));
                tmpCliente.setStatus(rsClientes.getInt("status_CLIENTE"));
                
                lstClientes.add(tmpCliente);                
            }
            
            ConexaoDAO.fecharConexao();
            return lstClientes; // saida 1 - return            
            
        }catch(Exception erro){
            String msg = "Falha na listagem dos dados.\n"
                       + "Verifique a sintaxe da instrução Select e nomes de campos e tabelas.\n\n"
                       + "Erro Original: " + erro.getMessage(); 
            
            throw new Exception(msg); //saida 2
        }             
        
    }//fechando listarClientes - saida 3
    
    public static void alterarCliente() throws Exception{
        
    }
    
    public static void desativarCliente() throws Exception{
        
    }
            
    
}
