#include<stdio.h>
#include<stdlib.h>
#include<conio.h>

int main(){
	//declaração de variáveis
	int m, n, i, j, p, aux;
		
	printf("** PROGRAMA TABUADA 2 **\n\n");
	
	printf("Informe o valor inicial: ");
	scanf("%d", &m);
	printf("Informe o valor final: ");
	scanf("%d", &n);
	
	if(m > n){		
		aux = m;
		m = n;
		n = aux;
	}
	
	for(i=m; i<=n; i++){
		
		for(j=0; j<=10; j++){
			p = i * j;
			printf("%d\tX\t%d\t=\t%d\n", i, j, p);			
		}
		
		getch();
		system("cls");
		
	}
	
	system("pause");
	printf("\n\n");
}
