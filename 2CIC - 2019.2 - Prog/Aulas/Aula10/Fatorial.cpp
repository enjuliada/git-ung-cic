#include <stdio.h>
#include <stdlib.h>

int main(){
	int valor, i, result;
	
	printf("** PROGRAMA FATORIAL **\n\n");
	
	printf("Entre com o valor: ");
	scanf("%d", &valor);
	
	//calculo
	for(i = valor-1; i>1; i--){
		valor *= i; // valor = valor * i; (mesma coisa)
		printf("Parciais: %d\t(.%d)\n", valor, i);
	}
	
	printf("\nFATORIAL: %d", valor);
	
	
	
}
