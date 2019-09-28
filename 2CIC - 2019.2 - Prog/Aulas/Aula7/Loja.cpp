#include<stdio.h>
#include<stdlib.h>
#include<locale.h>

int main(){
	
	int nota;
	int qtdeP = 0, qtdeR = 0, qtdeB = 0, qtdeO = 0;
	int soma = 0, total;
	float porcP, porcR, porcB, porcO;
	float media;
	
	
	setlocale(LC_ALL,"");
	
	do{
	
	printf("**** Programa de satisfaÁ„o do cliente ****\n\n");
	
	printf("Informe a nota do atendimento: \n\n");
	printf("Nota\t\tAvaliaÁ„o\n");
	printf("-------------------------------\n");
	printf("AtÈ 4\t\tPÈssimo\n");
	printf("4->6\t\tRegular\n");
	printf("6->8\t\tBom\n");
	printf("8->10\t\t”timo\n\n");
	
	printf("Nota: ");
	scanf("%d", &nota);
	
	
	if(nota<4){
		printf("**P…SSIMO**");
		qtdeP++; //qtdeP = qtdeP + 1
		soma+=nota; //soma = soma + nota;
		
	}else if(nota < 6){
		printf("**REGULAR**");
		qtdeR++; 
		soma+=nota;
		
	}else if(nota < 8){
		printf("**BOM**");
		qtdeB++; 
		soma+=nota;
		
	}else if(nota <= 10){
		printf("**”TIMO**");
		qtdeO++; 
		soma+=nota;
		
	}else if(nota != 1234){
		printf("**NOTA INV¡LIDA**");
	}
	
	_sleep(500);
	system("cls");
	
	}while(nota != 1234);
	
	//Calculos Finais
	total = qtdeP + qtdeR + qtdeB + qtdeO; //total de partic.
	media = soma/total; //mÈdia das notas
	//porcentagens
	porcP = ((float)qtdeP / (float)total) * 100;
	porcR = ((float)qtdeR / (float)total) * 100;
	porcB = ((float)qtdeB / (float)total) * 100;
	porcO = ((float)qtdeO / (float)total) * 100;
	
	system("cls");
	printf("### RELATORIO FINAL ###\n\n");
	
	printf("Total de Participantes: %d\n", total);
	printf("MÈdia Obtida: %.1f\n\n", media);
	
	printf("Percentual - PÈssimo: %d - %.1f %%\n", qtdeP, porcP);
	printf("Percentual - Regular: %d - %.1f %%\n",qtdeR, porcR);
	printf("Percentual - Bom: %d - %.1f %%\n",qtdeB, porcB);
	printf("Percentual - ”timo: %d - %.1f %%\n",qtdeO, porcO);
	
	printf("\n\n");
	system("pause");
}
