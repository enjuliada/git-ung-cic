#include<stdio.h>
#include<stdlib.h>

int main(){
	//declaração das variaveis
	int valor, contador = 0, maior = 0;
	
	printf("**** PROGRAMA MAIOR ****\n\n");
	
	do{
		printf("Valor: ");
		scanf("%d", &valor);
		
		if(valor!=0){
			contador++;
			
			if(contador == 1){
				maior = valor;//maior é o primeiro digitado
			}else{
				if(valor > maior){
					maior = valor;					
				}	
			}			
		}
		
	}while(valor != 0);
	
	printf("\n\nValores Digitados: %d\n", contador);
	printf("Maior Valor: %d\n", maior);
	
	
	printf("\n\n");
	system("pause");
	
}
