#include<stdio.h>
#include<stdlib.h>
#include<string.h>
#include<locale.h>

int main(){
	//declaração das variaveis
	int categoria;
	int qLimp=0, qDom=0, qBeb=0,
		qDoc=0, qFr=0, qSalg=0,
		qGr=0;
	int total;
	
	char nomeCat[30];
	
		
	//desenvolvimento	
	setlocale(LC_ALL,"");
	
	do{
	
	printf("**** PROGRAMA ESTOQUE ****\n\n");
	
	printf("Informe a categoria do Produto: ");
	scanf("%d", &categoria);

	switch(categoria){
		case 1:
			qLimp++;			
			strcpy(nomeCat,"Limpeza");
			printf("%s -- %d\n", nomeCat, qLimp);
			_sleep(500);
			break;			
		case 2:
			qDom++;			
			strcpy(nomeCat,"Utensílios Domésticos");
			printf("Processando...\n%s -- %d", nomeCat, qDom);
			_sleep(500);
			break;						
		case 3:
			qBeb++;			
			strcpy(nomeCat,"Bebidas");
			printf("Processando...\n%s -- %d", nomeCat, qBeb);
			_sleep(500);
			break;
		case 4:
			qDoc++;			
			strcpy(nomeCat,"Doces");
			printf("Processando...\n%s -- %d", nomeCat, qDoc);
			_sleep(500);
			break;
		case 5:
			qFr++;			
			strcpy(nomeCat,"Frios");
			printf("Processando...\n%s -- %d", nomeCat, qFr);
			_sleep(500);
			break;
		case 6:
			qSalg++;			
			strcpy(nomeCat,"Salgadinhos");
			printf("Processando...\n%s -- %d", nomeCat, qSalg);
			_sleep(500);
			break;
		case 7:	
			qGr++;			
			strcpy(nomeCat,"Grãos");
			printf("Processando...\n%s -- %d", nomeCat, qGr);
			_sleep(500);
			break;
		case 0:
			printf("Encerrando....");		
			_sleep(1000);
			
			break;
		default:  //nenhum dos anteriores
			printf("Categoria Inválida");
			_sleep(500);
			break;			
	}//fechando switch case
		
	system("cls");
	
	}while(categoria != 0);
	
	system("cls");
	
	printf("**** PROGRAMA ESTOQUE ****\n\n");
	printf("Código\t\tItem\t\tQuantidade\n");
	printf("--------------------------------------------\n");
	printf("1\t\tLimpeza\t\t%d\n", qLimp);
	printf("2\t\tUtens. Dom.\t%d\n", qDom);
	printf("3\t\tBebidas.\t%d\n", qBeb);
	printf("4\t\tDoces\t\t%d\n", qDoc);
	printf("5\t\tFrios\t\t%d\n", qFr);
	printf("6\t\tSalgadinhos\t%d\n", qSalg);
	printf("7\t\tGrãos\t\t%d\n\n\n", qGr);
	
	total = qLimp + qDoc + qDom + qSalg + qFr + qGr + qBeb;
	
	printf("TOTAL DE ITENS: %d", total);
	
	
	
	//finalização
	printf("\n\n");
	system("pause");
	
	
}

