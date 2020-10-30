#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>
#include<math.h>
#include<conio.h>

char nomePers[21];
int classe;
int atributos[6];

void definirAtrib(int tmpClasse){
	
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

int main(){
	
	int classe;
	
	setlocale(LC_ALL,"");
	printf("**** CRAZY DUNGEONS ****\n\n");
	
	printf("Escolha uma classe: \n\n");
	printf("1 - Guerreiro\n");
	printf("2 - Arqueiro\n");
	printf("3 - Paladino\n");
	printf("Opção: ");
	scanf("%d", &classe);
	
	desenharClasse(classe);
	
	printf("\n\n");
	printf("Informe o nome do personagem: ");
	scanf("%s", &nomePers);
	
}
