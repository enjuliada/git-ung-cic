#include <stdio.h>
#include <stdlib.h>

int main(){
	//declaração das variáveis	
	int inicio, contador = 0, soma = 0;
	
	printf("**** PROGRAMA PARES **** \n\n");
	
	printf("Entre com o valor inicial: ");
	scanf("%d", &inicio);
	
	if(inicio % 2 != 0){
		inicio++;
	}
		
	while(contador < 20){
		printf("%d - ", inicio);
		contador++;
		soma += inicio; //soma = soma + inicio;
		inicio+=2; //inicio = inicio + 2;		
	}//fechando while
	
	printf("\n\n Soma Final: %d", soma);
	
	printf("\n\n");
	system("pause");
}
