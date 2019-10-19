#include<stdio.h>
#include<stdlib.h>

int main(){
	
	int i, valor, menor, maior, soma = 0;
	float media;
	
	printf("** PROGRAMA DADOS **\n\n");
	
	for(i=1; i<=10; i++){
		printf("Valor %d:",i);
		scanf("%d", &valor);
		
		if(i == 1){ //1º digitado
			maior = valor;
			menor = valor;
		}else{ //nao for o 1º digitado
			
			if(valor > maior){
				maior = valor;
			}else if(valor < menor){
				menor = valor;
			}
			
		}//fechando else (ext.)
		
		soma += valor;
		
	}//fechando for
	
	media = (float)soma/10;
	
	system("cls");
	
	printf("Apresentando resultados: \n\n");
	
	printf("MAIOR VALOR: %d\n", maior);
	printf("MENOR VALOR: %d\n", menor);
	printf("SOMA: %d\n", soma);
	printf("MEDIA: %.1f", media);
	
	
	printf("\n\n");
	system("pause");
	
	
}
