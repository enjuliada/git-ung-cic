#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <locale.h>
#include <conio.h>
#include <math.h>

int poltronas[250], ocupadas = 0, disponiveis = 250;
int i;
float caixa;

void esvaziarPoltronas(){
	for(i=0; i<250; i++){
		poltronas[i] = 0;
	}
}

void exibirMapa(int tmpInicio, int tmpFim){
	char status[10];
	
	for(i=tmpInicio; i<=tmpFim; i++){
		
		if(i==0) 
			printf("\n## SETOR VIP ##\n\n");
		else if(i==50){			
			printf("\n\n## SETOR COMUM ##\n\n");
		}else if(i==150){
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
	
	printf("\n\n");
	system("pause");	
	
	
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
		if((tmpPoltrona-1)>=0 && (tmpPoltrona-1)<=49){
			preco = 300;			
		}else if((tmpPoltrona-1)<=149){
			preco = 200;			
		}else{
			preco = 100;
		}
		printf("Valor a pagar: R$ %.2f\n", preco);
		caixa += preco; //caixa = caixa + preco;
		poltronas[tmpPoltrona-1] = 1;//ocupando poltrona
		
		ocupadas++;
		disponiveis--;
		
		return 1;
		
	} //fechando else princ.
	
} //fechando efetuarVenda

void menuVenda(){
	int statusVenda, nPolt, setor;
	int inicio, fim;
	
	system("cls");
	printf("## PROCESSO DE VENDA DE INGRESSO ##\n\n");
	printf("Entre com o setor:\n\n");
	printf("1 - Setor Vip\n");
	printf("2 - Setor Comum\n");
	printf("3 - Setor Superior\n\n");
	printf("Setor: ");
	scanf("%d", &setor);
	
	if(setor == 1){
		inicio = 0;
		fim = 49;		
	}else if(setor == 2){
		inicio = 50;
		fim = 149;
	}else{
		inicio = 150;
		fim = 249;
	}
	
	exibirMapa(inicio,fim);
	
	printf("\nInforme o número da poltrona:");
	scanf("%d", &nPolt);
	
	statusVenda = efetuarVenda(nPolt);
	
	if(statusVenda == -1){
		printf("\n## POLTRONA OCUPADA!\n\n");
		_sleep(1500);
	}else if(statusVenda == -2){
		printf("\n## POLTRONA INEXISTENTE!\n\n");
		_sleep(1500);
	}else{
		printf("\n## Venda Efetuada: %d\n\n", nPolt);
		_sleep(2500);
	}
	
}

void gerarRelatorio(){

int vips=0, comuns=0, sups=0;

	for(i=0; i<250; i++){
		if(poltronas[i] == 1){
			if(i<50){
				vips++;
			}else if(i<150){
				comuns++;
			}else{
				sups++;
			}	
		}	
	}
	
	system("cls");
	printf("## RELATÓRIO DE VENDAS ## \n\n");
	printf("Setor VIP: %d\n", vips);
	printf("Setor Comum: %d\n", comuns);
	printf("Setor Superior: %d\n\n", sups);
	printf("Ingressos Vendidos: %d\n",ocupadas);
	printf("Ingressos Restantes: %d\n\n",disponiveis);
	printf("-- TOTAL EM CAIXA ==> %.2f\n\n",caixa);	
	system("pause");
	
	
	
}

int main(){

	int menu;
	
	setlocale(LC_ALL,"");
	
	esvaziarPoltronas();
		
	do{
		system("cls");
		menu = montarMenu();
		
		switch(menu){
			case 1:
				//efetuar venda	
				menuVenda();			
				break;
			
			case 2:
				exibirMapa(0,49);			
				exibirMapa(50,149);			
				exibirMapa(150,249);
				
				break;
				
			case 3:
				//relatorio
				gerarRelatorio();
				break;
			
			case 4:
				break;
			
			default:
				printf("\n## ALERTA DE ERRO ## \n\n");
				printf("\nOpção Inválida! \n\n");
				_sleep(1500);
				system("cls");
				break;
		}
		
		
	}while(menu != 4);
	
	
}//fechando main

