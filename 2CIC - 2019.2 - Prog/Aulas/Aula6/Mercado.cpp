#include<stdio.h>
#include<stdlib.h>
#include<string.h>
#include<locale.h>

int main(){
	//variaveis
	int categoria;
	int qtdeA = 0, qtdeB = 0,
		qtdeC = 0, qtdeD = 0,
		qtdeE = 0, qtdeF = 0;
	int total = 0;
	
	setlocale(LC_ALL,"");
	
	do{
			
		printf("**** PROGRAMA MERCADO **** \n\n");
		
		printf("Informe a categoria do produto:\n\n");
		printf("Código\t\tCategoria\tCorredor\n");
		printf("---------------------------------------\n");
		printf("1\t\tLimpeza\t\tA\n");
		printf("2\t\tHigiene\t\tB\n");
		printf("3\t\tBebidas\t\tC\n");
		printf("4\t\tFrios\t\t\D\n");
		printf("5\t\tGrãos\t\tE\n");
		printf("6\t\tBiscoitos\tF\n\n");
		printf("Categoria: ");
		scanf("%d",&categoria);
		
		switch(categoria){
			case 1:
				system("cls");
				printf("LIMPEZA\n\n");
				printf("Encaminhando para: ");
				_sleep(2000);
				printf("CORREDOR A");
				_sleep(1000);
				system("cls");
				qtdeA = qtdeA + 1; //add prod no corredor A
				break;
			case 2:
				system("cls");
				printf("HIGIENE\n\n");
				printf("Encaminhando para: ");
				_sleep(2000);
				printf("CORREDOR B");
				_sleep(1000);
				system("cls");
				qtdeB = qtdeB + 1; //add prod no corredor A
				break;
			case 3:
				system("cls");
				printf("BEBIDA\n\n");
				printf("Encaminhando para: ");
				_sleep(2000);
				printf("CORREDOR C");
				_sleep(1000);
				system("cls");
				qtdeC = qtdeC + 1; //add prod no corredor A
				break;
			case 4:
				system("cls");
				printf("FRIOS\n\n");
				printf("Encaminhando para: ");
				_sleep(2000);
				printf("CORREDOR D");
				_sleep(1000);
				system("cls");
				qtdeD = qtdeD+ 1; //add prod no corredor A
				break;				
			case 5:
				system("cls");
				printf("GRÃOS\n\n");
				printf("Encaminhando para: ");
				_sleep(2000);
				printf("CORREDOR E");
				_sleep(1000);
				system("cls");
				qtdeE = qtdeE + 1; //add prod no corredor A
				break;
			case 6:
				system("cls");
				printf("BISCOITOS\n\n");
				printf("Encaminhando para: ");
				_sleep(2000);
				printf("CORREDOR F");
				_sleep(1000);
				system("cls");
				qtdeF = qtdeF + 1; //add prod no corredor A
				break;
			case 0:
				printf("Encerrando inventário");
				_sleep(700); printf(".");
				_sleep(700); printf(".");
				_sleep(700); printf(".");
				_sleep(700); printf(".");
				_sleep(700); printf(".");
				_sleep(700); printf(".");
				break;
			default:
				printf("CATEGORIA INVÁLIDA!!!\n\n");
				_sleep(2000);				
				system("cls");				
				break;
		}//fechando switch
		
		
	}while(categoria != 0);
	
	system("cls");
	total = qtdeA + qtdeB + qtdeC + qtdeD + qtdeE + qtdeF;
	
	printf("** Resultados do inventário **\n\n");
	
	printf("----------------------------------\n");
	printf("Corredor A: %d produtos de Limpeza\n", qtdeA);	
	printf("====================================\n");
	printf("Corredor B: %d produtos de Higiene\n", qtdeB);	
	printf("====================================\n");
	printf("Corredor C: %d Bebidas\n", qtdeC);	
	printf("====================================\n");
	printf("Corredor D: %d Frios\n", qtdeD);	
	printf("====================================\n");
	printf("Corredor E: %d Grãos\n", qtdeE);	
	printf("====================================\n");
	printf("Corredor F: %d Biscoitos\n", qtdeF);	
	printf("====================================\n");
	printf("TOTAL: %d PRODUTOS ARMAZENADOS\n", total);
	printf("----------------------------------\n");	
	printf("\n\n");
	system("pause");
	
}
