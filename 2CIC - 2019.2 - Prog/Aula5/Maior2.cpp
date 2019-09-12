#include<stdio.h>
#include<stdlib.h>
#include<locale.h>

int main(){
	
	int n1, n2, n3; //variáveis
	
	setlocale(LC_ALL,"");
	printf("***** PROGRAMA MAIOR *****\n\n");
	
	/*desenvolvimento do algoritmo*/
	printf("Primeiro valor: ");
	scanf("%d",&n1);
	printf("Segundo valor: ");
	scanf("%d",&n2);
	printf("Terceiro valor: ");
	scanf("%d",&n3);
	
	if(n1 > n2){
		if(n1 > n3){
			printf("%d é o maior.\n",n1);
		}else{
			printf("%d é o maior.\n",n3);
		}
	}else{
		if(n2 > n3){
			printf("%d é o maior.\n",n2);
		}else{
			printf("%d é o maior.\n",n3);
		}
	}




	printf("\n\n");
	system("pause");
}
