#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>
#include<math.h>
#include<conio.h>
#include<time.h>

char nomePers[21];
int classe;
float atributos[6];
char nomeAtributos[6][10], ambientes[15][15];
char m1[5][12];
float vM1[5], dM1[5];
int contTela = 0;

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

void gerarDados(){
	strcpy(nomeAtributos[0],"Vida");
	strcpy(nomeAtributos[1],"Dano");
	strcpy(nomeAtributos[2],"Crítico");
	strcpy(nomeAtributos[3],"Força");
	strcpy(nomeAtributos[4],"Destreza");
	strcpy(nomeAtributos[5],"Vitalidade");
	
	strcpy(ambientes[0],"Bosque");
	strcpy(ambientes[1],"Taverna");
	strcpy(ambientes[2],"Floresta");
	strcpy(ambientes[3],"Catacumba");
	strcpy(ambientes[4],"Cemitério");
	strcpy(ambientes[5],"Caverna");
	strcpy(ambientes[6],"Pântano");
	strcpy(ambientes[7],"Vilarejo");
	strcpy(ambientes[8],"Campo"); 
	strcpy(ambientes[9],"Castelo"); 
	strcpy(ambientes[10],"Riacho"); 
	strcpy(ambientes[11],"Mausoléu");
	
	strcpy(m1[0],"Aranha");
	strcpy(m1[1],"morcego");
	strcpy(m1[2],"Rato");
	strcpy(m1[3],"Lobo");
	strcpy(m1[4],"Cobra");
	
	vM1[0] = 30;
	vM1[1] = 40;
	vM1[2] = 55;
	vM1[3] = 70;
	vM1[4] = 60;
	
	dM1[0] = 10;
	dM1[1] = 5;
	dM1[2] = 8;
	dM1[3] = 13;
	dM1[4] = 9;	
	
}

int gerarBatalha(int idMonstro){
			
		int vidaGanha = vM1[idMonstro]*(float)0.1;
		
		while(vM1[idMonstro]>0){
		
			vM1[idMonstro]-=atributos[1];// tirando vida do monstro de acordo com meu dano
			printf("Seu Dano: %.1f\n",atributos[1]);
			printf("Vida do inimigo: %.1f\n",vM1[idMonstro]);
		
			_sleep(1000);
		
			if(vM1[idMonstro] <= 0){
				printf("\n\nVOCÊ MATOU O %s!\n\n",m1[idMonstro]);
				atributos[0] += vidaGanha;
				printf("Bonus de vida: %1.f\n\n", atributos[0]);
				 
			}else{
				atributos[0]-=dM1[idMonstro];
				printf("\n\nDano do Inimigo: %.1f\n",dM1[idMonstro]);
				printf("Sua vida: %.1f\n\n",atributos[0]);
				
				_sleep(1000);
				
				if(atributos[0]<=0){
					printf("**** GAME OVER!!! ***");
					break;					
				}
		}	
	}
}
	
void criarAmbiente(){
	
	vM1[0] = 30;
	vM1[1] = 40;
	vM1[2] = 55;
	vM1[3] = 70;
	vM1[4] = 60;
	
	int opc, idMonstro=0, idTela=0;	
		
	idMonstro = rand() % 4;
	
	if(contTela<=1){
		idTela = contTela;
	}else{
		idTela = 2 + rand() % 9;
	}
	
		
	printf("%s está andando em um %s, e se depara com um %s.\nEscolha a opção desejada:\n\n",nomePers, ambientes[idTela], m1[idMonstro]);
	printf("1 - Enfrentar inimigo\n");
	printf("2 - Avançar \n\n");
	printf("Opção: ");
	scanf("%d", &opc);
	
	if(opc == 1){
		gerarBatalha(idMonstro);
		system("pause");
		
		
	}
	system("cls");
	contTela++;		
}

int main(){
	
	int classe;
	
	setlocale(LC_ALL,"");
	srand(time(NULL));	
	
	gerarDados();	
	
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
	
	system("cls");
	
	printf ("Início do jogo...\n\n\n");
	
	while(contTela<5){
		criarAmbiente();
	}
	
}
