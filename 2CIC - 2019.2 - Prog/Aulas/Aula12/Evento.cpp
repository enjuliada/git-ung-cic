#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <locale.h>
#include <conio.h>
#include <math.h>

int poltronas[250];
int i;
float caixa;

void esvaziarPoltronas(){
	for(i=0; i<250; i++){
		poltronas[i] = 0;
	}
}

void exibirMapa(){
	char status[10];
	
	for(i=0; i<250; i++){
		
		if(i==0) 
			printf("## SETOR VIP ##\n\n");
		else if(i==50){
			printf("\n\n");
			system("pause");
			printf("\n\n## SETOR COMUM ##\n\n");
		}else if(i==150){
			printf("\n\n\a");
			system("pause");
			printf("\n\n## SETOR SUPERIOR ##\n\n");
		}
		
		if(poltronas[i] == 0){
			strcpy(status,"LIVRE");
		}else{
			strcpy(status,"OCUP.");
		}
		
		
		printf("%d\t-   %s  ||\t\t", i+1, status);
		
		if((i+1)%5 == 0){
			printf("\n");
		}
		
		
	}
	
	getch();
	system("cls");
}

int montarMenu(){
	
	int opcao;

	printf("** PROGRAMA EVENTOS **\n\n");
	
	printf("Entre com a opção desejada:\n\n");
	printf("1 - Efetuar Venda de ingressos\n");
	printf("2 - Visualizar mapa do evento\n");
	printf("3 - Relatório de Caixa\n");
	printf("4 - Encerrar aplicação\n\n");
	printf("Opção: ");
	scanf("%d", &opcao);
	
	system("cls");
	
	return opcao;
	
	
	
}//fechando montarMenu

int efetuarVenda(int tmpPoltrona){
	float preco;
	
	if(poltronas[tmpPoltrona-1] == 1){
		return -1; //polt. ocup.
		
	}else if(tmpPoltrona<1 || tmpPoltrona>250){
		return -2; //polt. inex.
		
	}else{ //fazer venda
		if(tmpPoltrona>=0 && tmpPoltrona<=49){
			preco = 300;
		}else if(tmpPoltrona<=149){
			preco = 200;			
		}else{
			preco = 100;
		}
		
		caixa += preco; //caixa = caixa + preco;
		poltronas[tmpPoltrona-1] = 1;//ocupando poltrona
		
		return 1;
		
	} //fechando else princ.
	
} //fechando efetuarVenda

void menuVenda(){
	int statusVenda, nPolt, setor;
	
	system("cls");
	printf("## PROCESSO DE VENDA DE INGRESSO ##\n\n");
	printf("Entre com o setor:\n\n");
	printf("1 - Setor Vip\n");
	printf("2 - Setor Comum\n");
	printf("3 - Setor Superior\n\n");
	printf("Setor: ");
	scanf("%d", &setor);	
	
}

int main(){

	int menu;
	
	setlocale(LC_ALL,"");
	
	esvaziarPoltronas();
	
	do{
		
		menu = montarMenu();
		
		switch(menu){
			case 1:
				//efetuar venda				
				break;
			
			case 2:
				exibirMapa();
				break;
				
			case 3:
				//relatorio
				break;
			
			case 4:
				break;
			
			default:
				printf("\n##ALERTA DE ERRO ## \n\n");
				printf("\nOpção Inválida! \n\n");
				_sleep(1500);
				system("cls");
				break;
		}
		
		
	}while(menu != 4);
	
	
}//fechando main

