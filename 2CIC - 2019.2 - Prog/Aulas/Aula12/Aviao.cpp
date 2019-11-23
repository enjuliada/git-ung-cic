#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>
#include<conio.h>

int main(){
	
	int opcao, i, classe, inicio, fim, cont = 0;
	int poltrona, ocupadas = 0, disponiveis = 250;
	float valor, taxa, caixa = 0;
	int aviao[250];
	char nomeClasse[12];
	
	setlocale(LC_ALL,"");
	
	//esvaziando aviao
	for(i=0; i<250; i++){
		aviao[i] = 0;
	}
	
	do{
		printf("** Flying to death - UNG ** \n\n");
		
		printf("MENU PRINCIPAL\n\n");
		printf("1 - Efetuar Venda\n");
		printf("2 - Visualizar mapa de poltronas\n");
		printf("3 - Relatório de vendas\n");
		printf("4 - Realizar estorno (em breve)\n");
		printf("5 - Encerrar aplicação\n\n");
		
		printf("Opção: ");
		scanf("%d", &opcao);
		
		
		switch(opcao){
			case 1:
				//efetuar venda
				system("cls");
				printf("Selecione uma classe: \n\n");
				printf("Código\t\t|\tClasse\t\t|\tValor\t\t\t|\tPoltronas\n");
				printf("-------------------------------------------------------------------------------------------------\n");
				printf("1\t\t|\tBusiness\t|\tR$ 7500,00 + tx\t\t|\t1->32\n");
				printf("2\t\t|\tExecutiva\t|\tR$ 4000,00 + tx\t\t|\t33->97\n");
				printf("3\t\t|\tEconômica\t|\tR$ 2100,00 + tx\t\t|\t98->250\n\n");
				
				printf("Código: ");
				scanf("%d", &classe);
				
				if(classe == 1){
					strcpy(nomeClasse,"Business");
					inicio = 0;
					fim = 31;
					taxa = 0.1;
					valor = 7500 + (7500 * taxa);					
				}else if(classe == 2){
					strcpy(nomeClasse,"Executiva");
					inicio = 32;
					fim = 95;
					taxa = 0.07;
					valor = 4000 + (4000 * taxa);
				}else if (classe == 3){
					strcpy(nomeClasse,"Econômica");
					inicio = 96;
					fim = 249;
					taxa = 0.05;
					valor = 2100 + (2100 * taxa);
				}
				
				system("cls");
				printf("##### %s #####\n\n", nomeClasse);
				
				printf("Poltronas Disponíveis: \n\n");
				
				for(i=inicio; i<=fim; i++){
					if(aviao[i] == 0){
						printf("Polt. [%d]\t",i+1);
						cont++;
					}
					
					if(cont % 8 == 0) printf("\n");					
				}
				
				/***VOLTAR AQUI ***/
				printf("\n\n");
				printf("Informe o número da poltrona: ");
				scanf("%d", &poltrona);
				
				if(aviao[poltrona - 1] == 0){ //livre
					printf("Total a pagar: R$ %.2f\n", valor);
					caixa+=valor;
					aviao[poltrona - 1] = 1;
					printf("Reservando Poltrona...\n");
					_sleep(1000);
					printf("Poltrona Reservada: [%d]", poltrona);
					disponiveis--;
					ocupadas++;
				}else{
					
					printf("Poltrona Ocupada...\n");
					printf("Não foi possível realizar a venda. Tente novamente.\n");
				}
				
				getch();				
				break;
			
			case 2:
				//mapa de poltronas
				system("cls");
				printf("## Mapa do avião ##\n\n");
				cont=0;
				
				for(i=0; i<250; i++){
					
					if(i==0) printf("-- Business --\n\n");
					else if(i==32) printf("\n\n-- Executiva --\n\n");
					else if(i==96) printf("\n\n-- Econômica --\n\n");
					
					if(aviao[i] == 0){
						printf("[%d]:\t\t",i+1);
					}else{
						printf("[%d]: OCUPADA*\t",i+1);
					}
					
					cont++;
					if(cont % 8 == 0) {
						printf("\n");						
					}
				} //fechando for
				
				printf("\n\n");
				system("pause");	
				
				break;
				
			case 3:
				//relatorio
				system("cls");
				printf("Poltronas Ocupadas: %d\n", ocupadas);
				printf("Poltronas Disponíveis: %d\n", disponiveis);
				printf("Total em caixa: R$ %.2f",caixa);
				
				getch();
				break;
			
			case 4:
				//estorno
				system("cls");
				printf("## Processo de estorno ##\n\n");
				
				int poltEst;
				float valorDev;
				
				printf("Informe o número da poltrona: ");
				scanf("%d", &poltEst);
				
				if(aviao[poltEst-1] == 0){
					printf("Poltrona Inválida.\n");
					printf("Cancelando procedimento de estorno...");
					_sleep(1700);
					system("cls");
					break;
				}else{
					if(poltEst <= 32){
						valorDev = 7500 * 0.8;
					}else if(poltEst <= 96){
						valorDev = 4000 * 0.8;
					}else{
						valorDev = 2100 * 0.8;
					}
					caixa -= valorDev;
					aviao[poltEst-1] = 0; //liberando poltrona
					disponiveis++;
					ocupadas--;
					
					printf("\nRealizando estorno...\n\n");
					_sleep(1500);
					printf("Poltrona Estornada: [%d]\n", poltEst);
					printf("Valor a ser devolvido: R$ %.2f\n",valorDev);
					getch();
					system("cls");
				}			
				
				break;
			
			case 5:
				break;
				
			default:
				printf("\n\nOpção Inválida!\n\n");
				_sleep(2000);
				break;	
		}
		
		cont = 0;
		system("cls");
			
	}while(opcao != 5);
	
}

