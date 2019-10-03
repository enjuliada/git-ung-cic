#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>

int main(){
	 //declaração de variaveis
	int numCand, totEleit = 0;
	int qtCand1 = 0, qtCand2 = 0, qtCand3 = 0,
	    qtCand4 = 0, qtBran = 0, qtNulo = 0;
	float pCand1, pCand2, pCand3, pCand4,
		pBran, pNulo;
	char nome[20];
	int i;
	 	 
	setlocale(LC_ALL, "");
	 
	do{
	 
		printf("**** PROGRAMA ELEIÇÃO ****\n\n");
		
		printf("Informe o número do candidato: \n\n");
		printf("Legenda\t\tCandidato\n");
		printf("------------------------------------\n");
		printf("1\t\t\tORTIZ\n");
		printf("2\t\t\tHEREDIA\n");
		printf("3\t\t\tALBUQUERQUE\n");
		printf("4\t\t\tULHMANN\n");
		printf("0\t\t\tNulo\n");
		printf("(Qualquer valor)\t\t\tBranco\n\n");
		
		printf("Seu voto: ");
		scanf("%d", &numCand);
		
		if(numCand == 0){
			qtNulo++; //qtNulo = qtNulo + 1;			
			totEleit++;
			strcpy(nome, "**NULO**");
		}else if(numCand == 1){
			qtCand1++;
			totEleit++;
			strcpy(nome, "**ORTIZ**");
		}else if(numCand == 2){
			qtCand2++;
			totEleit++;
			strcpy(nome, "**HEREDIA**");
		}else if(numCand == 3){
			qtCand3++;
			totEleit++;
			strcpy(nome, "**ALBUQUERQUE**");
		}else if(numCand == 4){
			qtCand4++;
			totEleit++;
			strcpy(nome, "**UHLMANN**");
		}else if(numCand < 0){ 
			break; //finaliza
		}else{
			qtBran++;
			totEleit++;
			strcpy(nome, "**BRANCO**");	
		}
		
		printf("\n\n%s",nome);
		_sleep(800);
		
		system("cls");
	}while(numCand >= 0);
	
	//calculos
	pCand1 = ((float)qtCand1/(float)totEleit)*100;
	pCand2 = ((float)qtCand2/(float)totEleit)*100;
	pCand3 = ((float)qtCand3/(float)totEleit)*100;
	pCand4 = ((float)qtCand4/(float)totEleit)*100;
	pBran = ((float)qtBran/(float)totEleit)*100;
	pNulo = ((float)qtNulo/(float)totEleit)*100;
	
	//Apresentação dos resultados
	system("cls");
	printf("**** RESULTADOS FINAIS ****\n\n");
	
	printf("ORTIZ: %d votos\n", qtCand1);
	for(i=0; i<pCand1; i++){
		printf("|");
		_sleep(30);
	}
	printf(" - %.1f%%\n\n",pCand1);
	
	/*****************************************/
	printf("HEREDIA: %d votos\n", qtCand2);
	for(i=0; i<pCand2; i++){
		printf("|");
		_sleep(30);
	}
	printf(" - %.1f%%\n\n",pCand2);
	
	/*****************************************/
	printf("ALBUQUERQUE: %d votos\n", qtCand3);
	for(i=0; i<pCand3; i++){
		printf("|");
		_sleep(30);
	}
	printf(" - %.1f%%\n\n",pCand3);
	/*****************************************/
	printf("ULHMANN: %d votos\n", qtCand4);
	for(i=0; i<pCand4; i++){
		printf("|");
		_sleep(30);
	}
	printf(" - %.1f%%\n\n",pCand4);
	/*****************************************/
	printf("BRANCOS: %d votos\n", qtBran);
	for(i=0; i<pBran; i++){
		printf("|");
		_sleep(30);
	}
	printf(" - %.1f%%\n\n",pBran);
	/*****************************************/
	printf("NULOS: %d votos\n", qtNulo);
	for(i=0; i<pNulo; i++){
		printf("|");
		_sleep(30);
	}
	printf(" - %.1f%%\n\n",pNulo);
	
		 
	printf("\n\n");
	system("pause");
	 
}

