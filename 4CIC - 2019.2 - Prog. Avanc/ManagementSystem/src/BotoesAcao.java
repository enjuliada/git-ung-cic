/* importando pacotes graficos e eventos*/
import javax.swing.*;
import java.awt.event.*;


/*Abstract Action � uma classe de bot�es que ser�o utilizados na barra de ferramentas*/
public class BotoesAcao extends AbstractAction {

/*Esta classe, recebe 3 par�metros: indice, icone e descri��o(TOOLTIPTEXT)*/
    public BotoesAcao(int indiceBotao, ImageIcon imgIcone, String strDescricao) {

		/*Definindo descri��o e icone do bot�o*/
		super(strDescricao, imgIcone);

		/*Atribuindo id do botão e implementando a descri��o no TOOLTIPTEXT
		 ****obs: ToolTipText � a rapida descri��o do nome do bot�o ao manter o mouse
		 *sobre ele*/
		this.putValue("id", indiceBotao);
		this.putValue(SHORT_DESCRIPTION, strDescricao);

    }

    public BotoesAcao(int indiceBotao, String strDescricao) {

		/*Definindo descri��o e icone do bot�o*/
		super(strDescricao);

		/*Atribuindo id do bot�o e implementando a descri��o no TOOLTIPTEXT
		 ****obs: ToolTipText � a rapida descri��o do nome do bot�o ao manter o mouse
		 *sobre ele*/
		this.putValue("id", indiceBotao);
		this.putValue(SHORT_DESCRIPTION, strDescricao);

    }

/*Definindo a��es para cada bot�o*/
    public void actionPerformed(ActionEvent evt){
            
    
    /*****ESSE TRECHO DE C�DIGO PODE SER IMPLEMENTADO NAS VERS�ES DO JDK1.6 OU MAIS ATUALIZADAS******/

    	
    }//fechando actionPerformed


}