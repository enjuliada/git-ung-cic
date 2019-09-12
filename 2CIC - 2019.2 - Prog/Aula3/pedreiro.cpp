#include<stdio.h>
#include<stdlib.h>
#include<locale.h>

int main(){
	//declaração das variáveis
	float Q, LM, AM, LT, AT, arg;
		
	system("color 6");	
		
	setlocale(LC_ALL,"");
	printf("*** PROGRAMA PEDREIRO ***\n\n");
	
	printf("Largura do muro: ");
	scanf("%f", &LM);
	printf("Altura do muro: ");
	scanf("%f", &AM);

	printf("Largura do tijolo: ");
	scanf("%f", &LT);
	printf("Altura do tijolo: ");
	scanf("%f", &AT);

	Q = (LM/AM)*(LT/AT); //QTDE DE TIJOLOS
	arg = Q * 0.15; //ARGAMASSA

	printf("\n\n");
	printf("Serão necessários %.0f tijolos.\n",Q); 
	printf("Argamassa: %.1f kg.",arg);

	printf("\n\n");
	system("pause");
	
}
