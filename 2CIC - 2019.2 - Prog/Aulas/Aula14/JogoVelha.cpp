#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <locale.h>

int tab[3][3];
int i, j;
int jogAtual = 1, jogadas = 0, vencedor = 0;
bool vitoria = false;

void iniciarTabuleiro(){
	for(i=0; i<3; i++){ //linhas
		for(j=0; j<3; j++){ //colunas
			tab[i][j] = 0;
		}
	}	
}

void exibirTabuleiro(){
for(i=0; i<3; i++){ //linhas
		for(j=0; j<3; j++){ //colunas			
			
			if(tab[i][j] == 1){
				printf("\tX\t||");
			}else if(tab[i][j] == 2){
				printf("\tO\t||");
			}else{
				printf("\t \t||");
			}//else			
		}//for j		
		printf("\n===================================================\n");
	} //for i
} //void

void efetuarJogada(){
	int l, c;
	printf("--- JOGADOR %d ---\n\n",jogAtual);
	printf("Informe a linha: ");
	scanf("%d",&l);
	printf("Informe a coluna: ");
	scanf("%d",&c);
	
	if(tab[l-1][c-1] == 0){ //se a posição for vazia
		tab[l-1][c-1] = jogAtual; //jogada
		jogadas++;
		
		if(jogAtual == 1) jogAtual++;
		else if(jogAtual == 2) jogAtual--;
	}	
}

void verificarVitoria(){
	int var;
	//verificando linhas
	for(var = 0; var<3; var++){
		if((tab[var][0] != 0) && (tab[var][0] == tab[var][1] && tab[var][0] == tab[var][2])){
			vitoria = true;
		}
	}
	//verficando colunas
	for(var = 0; var<3; var++){
		if((tab[0][var] != 0) && (tab[0][var] == tab[1][var] && tab[0][var] == tab[2][var])){
			vitoria = true;
		}
	}
	
	//diagonal princ.
	if((tab[0][0] != 0) && (tab[0][0] == tab[1][1] && tab[0][0] == tab[2][2])){
		vitoria  = true;
	}
	
	//diagonal sec.
	if((tab[0][2] != 0) && (tab[0][2] == tab[1][1] && tab[0][2] == tab[2][0])){
		vitoria  = true;
	}	
	
	//programar aqui
	if(jogAtual == 1)
		vencedor = jogAtual + 1;
	else if (jogAtual == 2)
		vencedor = jogAtual - 1	;	
}

int main(){
	iniciarTabuleiro();
	
	while(jogadas < 9){
		
		efetuarJogada();
		printf("\n\n\n");
		exibirTabuleiro();
				
		if(jogadas >= 5){
			verificarVitoria();
			
			if(vitoria == false && jogadas == 9){
				printf("\n\nDEU VELHA!!! \n\n");
			}else if(vitoria == true){
				printf("\n\nJOGADOR %d VENCEU!!", vencedor);
			break;
		}
		
		
			
		}
		
		printf("\n\n");
		system("pause");
		system("cls");
			
	}
}




