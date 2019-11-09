#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>
#include<conio.h>

int main(){
	
	int opcao, i, classe, inicio, fim, cont = 1;
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
				}else if(classe == 2){
					strcpy(nomeClasse,"Executiva");
					inicio = 32;
					fim = 95;
				}else if (classe == 3){
					strcpy(nomeClasse,"Econômica");
					inicio = 96;
					fim = 249;
				}
				
				system("cls");
				printf("##### %s #####\n\n", nomeClasse);
				
				printf("Poltronas Disponíveis: \n\n");
				
				for(i=inicio; i<=fim; i++){
					if(aviao[i] == 0){
						printf("Polt. [%d]\t",i);
						cont++;
					}
					
					if(cont % 8 == 0) printf("\n");					
				}
				
				
				getch();				
				break;
			
			case 2:
				//mapa de poltronas
				break;
				
			case 3:
				//relatorio
				break;
			
			case 4:
				//estorno
				break;
			
			case 5:
				break;
				
			default:
				printf("\n\nOpção Inválida!\n\n");
				_sleep(2000);
				break;	
		}
		
		cont = 1;
		system("cls");
		
		
		
			
	}while(opcao != 5);
	
}

