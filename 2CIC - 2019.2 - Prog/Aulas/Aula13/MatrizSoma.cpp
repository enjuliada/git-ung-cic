#include<stdio.h>
#include<conio.h>

int matA[3][3], matB[3][3], matC[3][3];
int i,j;

void preencherMatriz(int tmpMat[3][3]){
	
printf("-- Preenchendo matriz --\n");
	for(i=0; i<3; i++){
		for(j=0; j<3; j++){
			printf("MAT[%d][%d]: ",i,j);
			scanf("%d", &tmpMat[i][j]);
		} //fechando for j 
	} //fechando for i	
	
	printf("Matriz Preenchida");	
}

void somar(){

	for(i=0; i<3; i++){
		for(j=0; j<3; j++){
			matC[i][j] = matA[i][j] + matB[i][j];
		} //fechando for j 
	} //fechando for i
}

void exibirMatriz(int tmpMat[3][3]){
	for(i=0; i<3; i++){
		for(j=0; j<3; j++){
			printf("\t%d\t||", tmpMat[i][j]);				
		} //fechando for j 
		printf("\n====================================================\n");
	} //fechando for i
}

int main(){
	
	printf("** Soma de Matrizes **\n\n");
	
	preencherMatriz(matA);
	printf("\n\n");
	preencherMatriz(matB);
	
	somar();
	
	printf("\n----------------\n");
	exibirMatriz(matC);
	
	getch();	
	
}
