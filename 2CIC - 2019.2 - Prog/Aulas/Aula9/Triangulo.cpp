#include<stdio.h>
#include<stdlib.h>

int main(){
	int lado, i, j;
	
	printf("Informe a medida do lado: ");
	scanf("%d", &lado);
	
	system("cls");
	
	for(i=0; i<=lado; i++){
		for(j=0; j<i; j++){
			printf("# ");
		}
		printf("\n");
	}
	
}
