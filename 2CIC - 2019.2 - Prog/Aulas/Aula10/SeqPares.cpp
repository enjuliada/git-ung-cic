#include <stdio.h>
#include <stdlib.h>

int main(){
	int inicial, final, i, quant = 0;
	
	printf("** PROGRAMA PARES **\n\n");
	
	printf("Valor inicial: ");
	scanf("%d",&inicial);
	printf("Valor final: ");
	scanf("%d",&final);
	
	printf("\n\nSequencia: \n");
	
	for(i=inicial; i<=final; i++){
		
		if(i % 2 == 0){
			printf("%d  ", i);
			quant++;
		}//fechando if	
		
	}//fechando for
	
	printf("\n\nValores Encontrados: %d",quant);
	
	
	printf("\n\n");
	system("pause");
	
}
