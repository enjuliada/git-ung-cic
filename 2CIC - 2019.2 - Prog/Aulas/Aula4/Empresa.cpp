#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>

int main(){

	//declaração das variaveis
	int nivel;
	float sFixo, sFinal, com, vendas;
	char nome[6], resp;
			
	setlocale(LC_ALL, "");
	
	do{

		printf("***** PROGRAMA EMPRESA ******\n\n\n");
	
		//desenvolvimento
		printf("Nível do funcionário: ");
		scanf("%d", &nivel);
	
		if(nivel == 1){
			sFixo = 800;
			com = 0.05;
			strcpy(nome,"Zeca");
		
		}else if(nivel == 2){
			sFixo = 1000;
			com = 0.08;
			strcpy(nome,"Pedro");		
		
		}else if(nivel == 3){
			sFixo = 1200;
			com = 0.1;
			strcpy(nome,"Nino");
		
		}else if(nivel == 4){
			sFixo = 1500;
			com = 0.15;
			strcpy(nome,"Biba");
		
		}else{		
			printf("Dados inválidos!!!\n\n");
			//return 0;//sai do programa
		}
		
		if(nivel >= 1 && nivel <= 4){
		
		system("cls");
		printf("***** PROGRAMA EMPRESA ******\n\n\n");
	
		printf("Identificação: %d\n\n", nivel);
		printf("Funcionário: %s\n", nome);
		printf("Salário-Base: R$%.2f\n", sFixo);
		printf("Comissão: %.0f%%\n\n", com*100);
		
		printf("Total de Vendas: R$ ");
		scanf("%f",&vendas);
	
		sFinal = sFixo + (vendas * com);
	
		printf("\n\n");
		printf("Salário Final: R$ %.2f", sFinal);
	
		printf("\n\n");
		
		}	
		
		printf("Deseja efetuar nova consulta?(s/n) ");
		scanf("%s",&resp);
		
		system("cls");
				
	}while(resp == 's');
	
	system("pause");

} //fechando main






