#include<stdio.h>
#include<conio.h>

int main(){
	int i, j;
	int mat[3][3]; //mat[lin][col];
	
	printf("** PROGRAMA MATRIZ **\n\n");
	
	printf("-- Preenchendo matriz --\n");
	for(i=0; i<3; i++){
		for(j=0; j<3; j++){
			printf("MAT[%d][%d]: ",i,j);
			scanf("%d", &mat[i][j]);
		} //fechando for j 
	} //fechando for i
	
	printf("\n\n-- Exibindo matriz --\n\n");
	for(i=0; i<3; i++){
		for(j=0; j<3; j++){
			printf("\t%d\t||", mat[i][j]);				
		} //fechando for j 
		printf("\n====================================================\n");
	} //fechando for i
	
	getch();
	
}//int main
