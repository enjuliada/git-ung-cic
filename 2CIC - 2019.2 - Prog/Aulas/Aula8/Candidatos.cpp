#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>

int main(){
	//declaração de variaveis;
	int numCand, tEleit = 0;
	int qtCand1 = 0, qtCand2 = 0, qtCand3 = 0,
		qtCand4 = 0, qtNulo = 0, qtBran = 0;
	float pCand1, pCand2, pCand3, pCand4, pNulo, pBran;
	char nome[20];
	int i;
	
	setlocale(LC_ALL,"");
	
	do{
		printf("**** PROGRAMA ELEIÇÃO 2019****\n\n");
		
		printf("Informe o número do candidato:\n\n");
		printf("Número\t\t\tCandidato\n");
		printf("----------------------------------------\n");
		printf("1\t\t\tOrtiz\n");
		printf("2\t\t\tUlhmann\n");
		printf("3\t\t\tHeredia\n");
		printf("4\t\t\tAlbuquerque\n");
		printf("0\t\t\tNulo\n");
		printf("(Qualquer valor)\tBranco\n\n");
		
		printf("Seu voto: ");
		scanf("%d", &numCand);
		
		if(numCand == 1){
			strcpy(nome,"Ortiz"); //nome = "Ortiz";
			qtCand1++; //qtCand1 = qtCand1 + 1;
			tEleit++;
			
		}else if(numCand == 2){
			strcpy(nome,"Ulhmann"); 
			qtCand2++; 
			tEleit++;
			
		}else if(numCand == 3){
			strcpy(nome,"Heredia"); 
			qtCand3++; 
			tEleit++;
			
		}else if(numCand == 4){
			strcpy(nome,"Albuquerque");
			qtCand4++; 
			tEleit++;
			
		}else if(numCand == 0){
			strcpy(nome,"Nulo"); 
			qtNulo++; 
			tEleit++;
			
		}else if(numCand <= -1){
			break; //finaliza (interrompe o while)
						
		}else{
			strcpy(nome,"Branco"); //nome = "Ortiz";
			qtBran++; //qtCand1 = qtCand1 + 1;
			tEleit++;
		}
		
		printf("\n\nVoto computado: ** %s **", nome);
		_sleep(800);
				
		system("cls");
	}while(numCand > -1);
	
	//cálculos
		pCand1 = ((float)qtCand1/(float)tEleit)*100;
		pCand2 = ((float)qtCand2/(float)tEleit)*100;
		pCand3 = ((float)qtCand3/(float)tEleit)*100;
		pCand4 = ((float)qtCand4/(float)tEleit)*100;
		pNulo = ((float)qtNulo/(float)tEleit)*100;
		pBran = ((float)qtBran/(float)tEleit)*100;
	
	//Resultados
	system("cls");
	printf("***Resultados Finais***\n\n");
	
	printf("ORTIZ: %d\n", qtCand1);
	for(i=0; i<pCand1; i++){
		printf("|");
	}
	printf(" (%.1f%%)\n\n",pCand1);
	/***********************************/	
	printf("ULHMANN: %d\n", qtCand2);
	for(i=0; i<pCand2; i++){
		printf("|");
	}
	printf(" (%.1f%%)\n\n",pCand2);
	/***********************************/	
	printf("HEREDIA: %d\n", qtCand3);
	for(i=0; i<pCand3; i++){
		printf("|");
	}
	printf(" (%.1f%%)\n\n",pCand3);
	/***********************************/	
	printf("ALBUQUERQUE: %d\n", qtCand4);
	for(i=0; i<pCand4; i++){
		printf("|");
	}
	printf(" (%.1f%%)\n\n",pCand4);
	/***********************************/	
	printf("Brancos: %d\n", qtBran);
	for(i=0; i<pBran; i++){
		printf("|");
	}
	printf(" (%.1f%%)\n\n",pBran);
	/***********************************/	
	printf("Nulos: %d\n", qtNulo);
	for(i=0; i<pBran; i++){
		printf("|");
	}
	printf(" (%.1f%%)\n\n",pBran);
	
	
	printf("\n\n");	
	system("pause");
}



