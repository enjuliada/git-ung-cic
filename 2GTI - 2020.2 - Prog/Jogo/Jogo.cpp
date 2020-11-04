#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>
#include<math.h>
#include<conio.h>

char nomePers[21];
int classe;
float atributos[6];
char nomeAtributos[6][10];

void definirAtrib(int tmpClasse){
	
	if(tmpClasse == 1){ //Guerreiro
		
		atributos[3] = 20; //Força
		atributos[4] = 5; //Destreza
		atributos[5] = 10; //Vitalidade
		atributos[0] = 7 * atributos[5]; //Life
		atributos[2] = (float)0.6 * atributos[4]; //Crit
		atributos[1] = (float)1.8 * (atributos[3] + atributos[4]); //Dano
		
		
	}else if(tmpClasse == 2){ //Arqueiro
		
		atributos[3] = 5; //Força
		atributos[4] = 20; //Destreza
		atributos[5] = 10; //Vitalidade
		atributos[0] = 6 * atributos[5]; //Life
		atributos[2] = (float)1.2 * atributos[4]; //Crit
		atributos[1] = (float)2.2 * (atributos[3] + atributos[4]); //Dano
		
	}else if(tmpClasse == 3){ //Paladino
		
		atributos[3] = 15; //Força
		atributos[4] = 7; //Destreza
		atributos[5] = 13; //Vitalidade
		atributos[0] = (float)7 * atributos[5]; //Life
		atributos[2] = (float)0.7 * atributos[4]; //Crit
		atributos[1] = (float)1.7 * (atributos[3] + atributos[4]); //Dano
		
	}
	
}

void desenharClasse(int tmpClasse){
	if(tmpClasse == 1){
		printf ("\n\n**** GUERREIRO ****\n\n");
		printf("   . \n");
  		printf("  / \\\n");
  		printf("  | |\n");
  		printf("  | |\n");
  		printf("  |.|\n");
  		printf("  |.|\n");
  		printf("  |:|\n");
  		printf("  |:|\n");
		printf("'--8--'\n");
		printf("   8\n");
		printf("   O\n");
		
	}else if(tmpClasse == 2){
		printf ("\n\n**** ARQUEIRO ****\n\n");
		printf("    . \n");
		printf("    /\\\n");
        printf("   /  \\\n");
        printf("   -||-\n");
        printf("    ||\n");
        printf("    ||\n");
        printf("    ||\n");
        printf("    ||\n");
        printf("    /\\\n");
        printf("   /__\\\n"); 
        
	}else if(tmpClasse == 3){
		printf ("\n\n**** PALADINO ****\n\n");
		printf("    __________\n");
		printf("   |`-._/\\_.-`|\n");
   		printf("   |    ||    |\n");
   		printf("   |___o()o___|\n");
   		printf("   |__((<>))__|\n");
   		printf("   \\   o\\/o   /\n");
  		printf("    \\   ||   /\n");
    	printf("     \\  ||  /\n");
     	printf("      '.||.'	\n");
	}
}

void exibirDados(int tmpClasse){
	printf("**** DADOS DO PERSONAGEM ****\n\n");
	printf("Nome: %s\n", nomePers);
	desenharClasse(tmpClasse);
	
	printf("\n\n -- Detalhes do Personagem ---\n\n");
	
	int i;
	for(i=0;i<6;i++){
		printf("%s: %.1f\n",nomeAtributos[i], atributos[i]);
	}
	
}

int main(){
	
	int classe;
	
	setlocale(LC_ALL,"");
	
	strcpy(nomeAtributos[0],"Vida");
	strcpy(nomeAtributos[1],"Dano");
	strcpy(nomeAtributos[2],"Crítico");
	strcpy(nomeAtributos[3],"Força");
	strcpy(nomeAtributos[4],"Destreza");
	strcpy(nomeAtributos[5],"Vitalidade");
	
	printf("**** CRAZY DUNGEONS ****\n\n");
	
	printf("Escolha uma classe: \n\n");
	printf("1 - Guerreiro\n");
	printf("2 - Arqueiro\n");
	printf("3 - Paladino\n");
	printf("Opção: ");
	scanf("%d", &classe);
	
	printf("\n\n");
	printf("Informe o nome do personagem: ");
	scanf("%s", &nomePers);
	
	system("cls");
	
	definirAtrib(classe);	
	exibirDados(classe);
	
	printf("\n\n\n");
	system("pause");
	
}
