#include<stdio.h>
#include<windows.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>
#include<time.h>
#include<iostream>
#include<fstream>
#include<conio.h>

char nomePers[21];
int classe;
int atributos[6];
char nomeAtributos[6][10], ambientes[15][15];
char m1[5][12], m2[5][12];
int vM1[5], dM1[5];
int vM2[5], dM2[5];
int contTela = 0;

int idMonstro;

char nBoss[20];
int atribBoss[2];

int sorteados[12];

void desenhaBoss(){
printf("    .                                                      .\n");     
printf("        .n                   .                 .                  n.\n");
printf("  .   .dP                  dP                   9b                 9b.    .\n");  
printf(" 4    qXb         .       dX                     Xb       .        dXp     t\n");  
printf("dX.    9Xb      .dXb    __                         __    dXb.     dXP     .Xb\n");
printf("9XXb._       _.dXXXXb dXXXXbo.                 .odXXXXb dXXXXb._       _.dXXP\n");
printf(" 9XXXXXXXXXXXXXXXXXXXVXXXXXXXXOo.           .oOXXXXXXXXVXXXXXXXXXXXXXXXXXXXP\n");
printf("` 9XXXXXXXXXXXXXXXXXXXXX'~   ~`OOO8b   d8OOO'~   ~`XXXXXXXXXXXXXXXXXXXXXP'\n");
printf("`   9XXXXXXXXXXXP' `9XX'   DIE    `98v8P'  HUMAN   `XXP' `9XXXXXXXXXXXP'\n");
printf("       ~~~~~~~       9X.          .db|db.          .XP       ~~~~~~~\n");
printf("                       )b.  .dbo.dP'`v'`9b.odb.  .dX(\n");
printf("                     ,dXXXXXXXXXXXb     dXXXXXXXXXXXb.\n");
printf("                    dXXXXXXXXXXXP'   .   `9XXXXXXXXXXXb\n");
printf("                   dXXXXXXXXXXXXb   d|b   dXXXXXXXXXXXXb\n");
printf("                   9XXb'   `XXXXXb.dX|Xb.dXXXXX'   `dXXP\n");
printf("                    `'      9XXXXXX(   )XXXXXXP      `'\n");
printf("                             XXXX X.`v'.X XXXX\n");
printf("                             XP^X'`b   d'`X^XX\n");
printf("                             X. 9  `   '  P )X\n");
printf("                             `b  `       '  d'\n");
printf("                              `             '\n");                 
}

void desenhaAranha(){
	printf("      /      \\         \n");
	printf("    \\ \\  ,,  /  /      \n");
	printf("     '-.`\()/`.-'       \n");
	printf("   .--_'(  )'_--.      \n");
	printf("  / /` /`'''`\\ `\\ \\     \n");
	printf("   |  |  ><  |  |      \n");
	printf("   \\  \\      /  /      \n");
	printf("       '.__.'          \n");
}

void desenhaMorcego(){
	printf("    /\\                 /\\\n");
	printf("   / \\'._   (\\_/)   _.'/ \\\n");
	printf("  /_.''._'--('.')--'_.''._\\\n");
	printf("  | \\_ / `;=/ '' \\=;` \\ _/ |\n");
	printf("   \\/ `\\__|`\\___/`|__/`  \\/\n");
	printf("    `      \\(/|\\)/       `\n");
	printf("            '' ''\n");
}

void desenhaRato(){
	printf("              (\\_/)       \n");
	printf("     .-'''-.-.-' a\\       \n");
	printf("     /  \\      _.--'      \n");
	printf("    (\\  /_---\\\\_\\_        \n");
	printf("     `'-.                 \n");
	printf("      ,__)                \n");
}

void desenhaLobo(){
	printf("        _              \n");
	printf("       / \\      _-'    \n");
	printf("     _/|  \\-''- _ /    \n");
	printf("__-'   |          \\    \n");
	printf("    /             \\    \n");
	printf("    /       ''o.  |o      \n");
	printf("    |            \\ ;   \n");
	printf("                  ',   \n");
	printf("       \\_         __\\  \n");
	printf("         ''-_    \\.//  \n");
	printf("           / '-____'   \n");
	printf("          /            \n");
	printf("        _''            \n");
	printf("      _-'              \n");
}

void desenhaCobra(){
	printf("--..,_                         _,.--.            \n");
	printf("       `'.'.                .'`__ o  `;__.       \n");
	printf("         '.'.            .'.'`  '---'`  `        \n");
	printf("           '.`'--....--'`.'                      \n");
	printf("              `'--....--'`                       \n");
}

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
		printf("%s: %d\n",nomeAtributos[i], atributos[i]);
	}
	
}

void gerarDados(){
	int i;
	for(i=0; i<12; i++){
		sorteados[i] = -1;
	}
	
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
	strcpy(m1[1],"Morcego");
	strcpy(m1[2],"Rato");
	strcpy(m1[3],"Lobo");
	strcpy(m1[4],"Cobra");
	
	strcpy(m2[0],"Zumbi");
	strcpy(m2[1],"Esqueleto");
	strcpy(m2[2],"Goblin");
	strcpy(m2[3],"Mago Sombrio");
	strcpy(m2[4],"Elfo");
	
	vM1[0] = 45;
	vM1[1] = 50;
	vM1[2] = 75;
	vM1[3] = 90;
	vM1[4] = 80;
	
	vM2[0] = 85;
	vM2[1] = 100;
	vM2[2] = 90;
	vM2[3] = 110;
	vM2[4] = 95;
	
	dM1[0] = 15;
	dM1[1] = 10;
	dM1[2] = 13;
	dM1[3] = 18;
	dM1[4] = 14;	
	
	dM2[0] = 35;
	dM2[1] = 45;
	dM2[2] = 35;
	dM2[3] = 50;
	dM2[4] = 40;	
	
	strcpy(nBoss, "Horn - The King");
	
	atribBoss[0] = 150;
	atribBoss[1] = 40;	
	
}

int gerarBatalha(){
	
	vM1[0] = 45;
	vM1[1] = 50;
	vM1[2] = 75;
	vM1[3] = 90;
	vM1[4] = 80;
	
	vM2[0] = 85;
	vM2[1] = 100;
	vM2[2] = 90;
	vM2[3] = 110;
	vM2[4] = 95;
	
	bool morteC = false, morteB = false;
	int dBoss, dChar;
	
	
	if(idMonstro == 100){
		
		while(morteB == false && morteC == false){
					
			
			
			dBoss = rand() % atribBoss[1];
			
			atributos[0]-= dBoss;
			printf("\n\nDano do Inimigo: %d\n",dBoss);
			printf("Sua vida: %d\n\n",atributos[0]);
			
			_sleep(1000);
			
			if(atributos[0] <= 0){
				morteC = true;
			}
			
			if(morteC == true){
				printf("VOCÊ MORREU!");
				break;
			} 
			
			dChar = rand() % atributos[1];
				
			atribBoss[0]-= dChar;// tirando vida do monstro de acordo com meu dano
			printf("Seu Dano: %d\n",dChar);
			printf("Vida do inimigo: %d\n\n",atribBoss[0]);
			
			_sleep(1000);
			
			if(atribBoss[0] <= 0){
				morteB = true;
			}
			
			if(morteB == true){
				printf("VOCÊ VENCEU!");
				break;
			} 
			
		}
		
		
	}else{
		
		if(contTela < 6){
			
			switch (idMonstro){
			case 0:
				desenhaAranha();
				printf("\n\n");
				break;
				
			case 1:
				desenhaMorcego();
				printf("\n\n");
				break;
			case 2:
				desenhaRato();
				printf("\n\n");
				break;
			case 3:
				desenhaLobo();
				printf("\n\n");
				break;
			case 4:
				desenhaCobra();
				printf("\n\n");
				break;
		}
		
			
		int vidaGanha = vM1[idMonstro]*(float)0.1;
		
		while(vM1[idMonstro]>0){
		
			vM1[idMonstro]-=atributos[1];// tirando vida do monstro de acordo com meu dano
			printf("Seu Dano: %d\n",atributos[1]);
			printf("Vida do inimigo: %d\n",vM1[idMonstro]);
		
			_sleep(1000);
		
			if(vM1[idMonstro] <= 0){
				printf("\n\nVOCÊ MATOU O %s!\n\n",m1[idMonstro]);
				atributos[0] += vidaGanha;
				printf("Bonus de vida: %d\n\n", atributos[0]);
				 
			}else{
				atributos[0]-=dM1[idMonstro];
				printf("\n\nDano do Inimigo: %d\n",dM1[idMonstro]);
				printf("Sua vida: %d\n\n",atributos[0]);
				
				_sleep(1000);
				
				if(atributos[0]<=0){
					printf("**** GAME OVER!!! ***");
					break;					
				}
		}	
	}
	
	}else{
				
		int vidaGanha = vM2[idMonstro]*(float)0.1;
		
		while(vM2[idMonstro]>0){
		
			vM2[idMonstro]-=atributos[1];// tirando vida do monstro de acordo com meu dano
			printf("Seu Dano: %d\n",atributos[1]);
			printf("Vida do inimigo: %d\n",vM2[idMonstro]);
		
			_sleep(1000);
		
			if(vM2[idMonstro] <= 0){
				printf("\n\nVOCÊ MATOU O %s!\n\n",m2[idMonstro]);
				atributos[0] += vidaGanha;
				printf("Bonus de vida: %d\n\n", atributos[0]);
				 
			}else{
				atributos[0]-=dM2[idMonstro];
				printf("\n\nDano do Inimigo: %d\n",dM2[idMonstro]);
				printf("Sua vida: %d\n\n",atributos[0]);
				
				_sleep(1000);
				
				if(atributos[0]<=0){
					printf("**** GAME OVER!!! ***");
					break;					
				}
		}	
	}
	}
	}
}
	
int sortear(){	
	int i;
	int num;
		for(i=0; i<12; i++){
			num = 2 + rand() % 9;
			//printf("%d    ",num);			
		}	
	
	return num;	
}	
	
void criarAmbiente(){
	
	vM1[0] = 30;
	vM1[1] = 40;
	vM1[2] = 55;
	vM1[3] = 70;
	vM1[4] = 60;
	
	int opc, idTela=0;	
	int i,j;
	int repetiu=0;	
	int qtde=0;
	
	if(contTela<=1){
		idTela = contTela;
		sorteados[contTela] = idTela;
		printf("#%d - %s está andando em um %s, e se depara com um %s.\nEscolha a opção desejada:\n\n",contTela, nomePers, ambientes[idTela], m1[idMonstro]);				
		contTela++;
		
		printf("1 - Enfrentar inimigo\n");
	printf("2 - Avançar \n\n");
	printf("Opção: ");
	scanf("%d", &opc);
	
	printf("\n\n");
	
	if(opc == 1){
		
		gerarBatalha();
		system("pause");
		
		
	}
	system("cls");


		
	}else{
				
		for(i=0; i<12; i++){
		repetiu = 0;
		idTela = sortear();
		
		if(contTela>0){		
			for(j=contTela-1; j>=0; j--){
				if(idTela == sorteados[j]){
				//printf("%d",idTela);
					//printf("**\n");
					repetiu = 1;
					i--;				
				}		
			}
			
			if(repetiu == 0){
				if(contTela < 6)	
					printf("#%d - %s está andando em um %s, e se depara com um %s.\nEscolha a opção desejada:\n\n",contTela, nomePers, ambientes[idTela], m1[idMonstro]);
				else
					printf("#%d - %s está andando em um %s, e se depara com um %s.\nEscolha a opção desejada:\n\n",contTela, nomePers, ambientes[idTela], m2[idMonstro]);
					
				sorteados[contTela] = idTela;
				printf("1 - Enfrentar inimigo\n");
	printf("2 - Avançar \n\n");
	printf("Opção: ");
	scanf("%d", &opc);
	
	if(opc == 1){
		gerarBatalha();
		system("pause");
		
		
	}
	system("cls");

				contTela++;
			}
			
		}
		
	/*	switch(idTela){
		case 0:
			system("COLOR BF");
			break;
		case 1:
			system("COLOR CF");
			break;
		case 2:
			system("COLOR 1F");
			break;
		case 3:
			system("COLOR 06");
			break;	
		case 4:
			system("COLOR 0B");
			break;	
		case 5:
			system("COLOR 87");
			break;
		case 6:
			system("COLOR CF");
			break;
		case 7:
			system("COLOR 1F");
			break;
		case 8:
			system("COLOR 06");
			break;	
		case 9:
			system("COLOR 0B");
			break;	
	}	
	*/
	
		
	}
		
		
	}
	

	
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
	
	while(contTela<11){
		
		
		srand(time(NULL));	
		idMonstro = rand() % 5;
	
		criarAmbiente();
	}
	
	//Batalha Final
	system("cls");
	system("COLOR 4F");
	printf("*******Chegou o momento de enfrentar o %s.******\n\n", nBoss);
	
	desenhaBoss();
	printf("\n\n");
	
	idMonstro = 100;
	gerarBatalha();	
	
}
