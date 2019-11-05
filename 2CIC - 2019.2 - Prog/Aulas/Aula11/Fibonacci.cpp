#include<stdio.h>
#include<stdlib.h>
#include<locale.h>

int main(){
	
	int num, i;
	int a = 0, b = 1, prox, resp;
	
	
	setlocale(LC_ALL,"");
	
	printf("**SEQUÊNCIA FIBONACCI**\n\n");
	
	printf("Entre com o valor: ");
	scanf("%d",&num);
	
	if(num == 1){
		resp = a; //RESP: 0
		
	}else if(num == 2){
		resp = b; //RESP: 1
		
	}else{		
		printf("\n%d  %d  ",a, b);
		for(i=3; i<=num; i++){ //CALCULO		
			prox = a + b;
			a = b;
			b = prox;
			
			printf("%d  ", prox);
		}
		resp = prox;
	}
	
	printf("\n\nElemento: %d", resp);
	
	printf("\n\n");
	system("pause");
	
}
