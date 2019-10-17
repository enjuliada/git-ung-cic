#include<stdio.h>
#include<stdlib.h>

int main(){
	//declaração de variáveis
	int n, i, p;
		
	printf("** PROGRAMA TABUADA **\n\n");
	
	printf("Informe um valor: ");
	scanf("%d", &n);
	
	for(i=0; i<=10; i++){
		p = n * i;
		printf("%d\tX\t%d\t=\t%d\n", n, i, p);
	}
	
	system("pause");
	printf("\n\n");
}
