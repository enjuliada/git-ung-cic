#include<stdio.h>
#include<stdlib.h>
#include<locale.h>

int main(){
	
	float ped, giro, diam, dist;
	
	setlocale(LC_ALL,"");
	printf("***** PROGRAMA BICICLETA *****\n\n");
	
	printf("Giros por pedalada: ");
	scanf("%f",&giro);
	printf("Diâmetro da roda: ");
	scanf("%f",&diam);
	printf("Distância a ser percorrida(km): ");
	scanf("%f", &dist);
	
	ped = (dist*1000) / ((3.14*diam)/giro);
	printf("\n\n");
	
	printf("Serão necessárias aproximadamente %.0f pedaladas.", ped);
	
	printf("\n\n");
	system("pause");
}
