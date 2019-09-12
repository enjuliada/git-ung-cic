#include<stdio.h>
#include<stdlib.h>
#include<locale.h>

int main(){ //inicio
	float base, alt, area; //declaração das variaveis
	
	setlocale(LC_ALL,"");//compatibilizando caracteres
	
	printf("** PROGRAMA RETÂNGULO **\n\n\n");
	
	/***ENTRADA DE DADOS******/
	
	printf("Informe medida da base: ");
	scanf("%f", &base);
	
	printf("Informe medida da altura: ");
	scanf("%f", &alt);
	
	/*** PROCESSAMENTO ***/
	area = base * alt;
	
	/*** SAIDA DE DADOS ***/
	printf("\n\nA medida da área é %.2f.",area);
	
	printf("\n\n");
	system("pause");//impede o programa de encerrar automaticamente
	
} //fim do programa

