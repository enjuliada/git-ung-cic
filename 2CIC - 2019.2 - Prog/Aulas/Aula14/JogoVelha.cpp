#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <locale.h>

int tab[3][3];
int i, j;
int jogAtual = 1, jogadas = 0;
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
	
}

int main(){
	iniciarTabuleiro();
	exibirTabuleiro();
}




