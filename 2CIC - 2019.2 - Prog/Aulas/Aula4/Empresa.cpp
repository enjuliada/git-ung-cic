#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>

int main(){
	//declaração das variaveis
	int cod;
	float vendas, salFinal, salFixo, comissao;
	char nome[20], resp;
	bool erro = false; //bool(verd, falsa)
	
	setlocale(LC_ALL,"");
	
	do{
		
	printf("**** PROGRAMA EMPRESA ****\n\n");
	
	printf("Entre com o código do funcionário: ");
	scanf("%d", &cod);
	
	switch(cod){
		case 1:
			salFixo = 800;
			comissao = 0.05;
			strcpy(nome,"Zeca");
			break;
		case 2:
			salFixo = 1000;
			comissao = 0.08;
			strcpy(nome, "Pedro");
			break;
		case 3:
			salFixo = 1200;
			comissao = 0.1;
			strcpy(nome, "Nino");
			break;
		case 4:
			salFixo = 1500;
			comissao = 0.12;
			strcpy(nome, "Biba");
			break;
		default:
			salFixo = 0;
			comissao = 0;
			strcpy(nome, "Inexistente");
			erro = true;
			break;
	}//fechando switch case	
	
		if(erro == false){
			printf("Informe o valor das vendas:");
			scanf("%f", &vendas);
			
			salFinal = salFixo + (vendas * comissao);
			
			system("cls"); //limpa a tela
			printf("*** RELATÓRIO FINAL ***\n\n");
			
			printf("Nome do funcionário: %s\n",nome);
			printf("Salário-Base: R$ %.2f\n", salFixo);
			printf("Comissão: %.0f%%\n",comissao * 100);
			printf("Salário Total: R$ %.2f", salFinal);
					
		}else{
			printf("Código Inválido!");
		}
		
		printf("\n\nDeseja continuar? (s/n) ");
		scanf("%s", &resp);
		
		erro = false;
		system("cls");
		
	}while(resp == 's');
	
	printf("\n\n");
	system("pause");
	
}







