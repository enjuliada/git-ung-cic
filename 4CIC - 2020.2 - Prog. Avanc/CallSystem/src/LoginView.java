import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class LoginView extends JInternalFrame implements ActionListener{
    
    public static Container ctnLogin;    
    public static ImageIcon imgLogin;
    public static JLabel lblBanner, lblUsuario, lblSenha;
    public static JTextField txtUsuario;
    public static JPasswordField pwdSenha;
    public static JButton btnAcesso;
    
    public static Font fntLabel, fntTexto;
    
    
    public LoginView(){
        super("Login - Acesso ao sistema");
        
        ctnLogin = new Container();
        ctnLogin.setLayout(null);
        this.add(ctnLogin);
        
        imgLogin = new ImageIcon("img/icons/bannerLogin.png");
        lblBanner = new JLabel(imgLogin);
        lblBanner.setBounds(0,0,450,75);
        ctnLogin.add(lblBanner);
        
        fntLabel = new Font("Verdana", Font.BOLD, 20);
        fntTexto = new Font("Verdana", Font.PLAIN, 20);
        
        lblUsuario = new JLabel("Usuário:");
        lblUsuario.setFont(fntLabel);
        lblUsuario.setBounds(15,100,250,30);
        ctnLogin.add(lblUsuario);
        
        lblSenha = new JLabel("Senha:");
        lblSenha.setFont(fntLabel);
        lblSenha.setBounds(15,150,250,30);
        ctnLogin.add(lblSenha);
        
        txtUsuario = new JTextField();
        txtUsuario.setFont(fntTexto);
        txtUsuario.setBounds(120,100,290,30);
        ctnLogin.add(txtUsuario);
        
        pwdSenha = new JPasswordField();
        pwdSenha.setFont(fntTexto);
        pwdSenha.setBounds(120,150,290,30);
        ctnLogin.add(pwdSenha);
        
        btnAcesso = new JButton("Acessar Sistema");
        btnAcesso.addActionListener(this);
        btnAcesso.setBounds(15,200,395,35);
        ctnLogin.add(btnAcesso);
        
        this.setResizable(false);
        this.setLocation(700,150);
        this.setIconifiable(true);
        this.setSize(450,300);
        this.setVisible(true);
    }
    
    public void actionPerformed(ActionEvent evt){
        if(evt.getSource() == btnAcesso){
            
        }
        
    }//fechando actPerf
    
}//fechando class
