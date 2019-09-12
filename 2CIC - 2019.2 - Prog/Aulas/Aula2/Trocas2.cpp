#include<stdio.h>
#include<stdlib.h>
#include<locale.h>

int main(){ //inicio

	int a, b, aux; //variaveis
	
	setlocale(LC_ALL,"");//compatibilizando caracteres
	printf("** PROGRAMA TROCAS **\n\n\n");
	
	printf("Entre com o 1º valor: ");
	scanf("%d", &a);
	
	printf("Entre com o 2º valor: ");
	scanf("%d", &b);
	
	a = a + b;
	b = a - b;
	a = a - b;

	
	printf("\n\n");
	printf("VALOR FINAL DE A: %d.\n", a);
	printf("VALOR FINAL DE B: %d.\n", b);
	
	printf("\n\n");
	
	
	system("pause");//impede o programa de encerrar automaticamente
	
} //fim do programa

