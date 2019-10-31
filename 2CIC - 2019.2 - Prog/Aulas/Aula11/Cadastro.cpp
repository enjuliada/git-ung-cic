#include <stdio.h>
#include <stdlib.h>
#include <locale.h>
#include <string.h>

int main(){
	
	int i, idade[7];
	char nome[7][30]; //7 nomes(L) com 30 caracteres(C)
	
	setlocale(LC_ALL, "");
	
	for(i=0; i<7; i++){
		printf("** PROGRAMA CADASTRO **\n\n");
	
		printf("**Cliente Nº %d **\n\n", i+1);
		printf("Nome: ");
		scanf("%s", &nome[i]);
		printf("Idade: ");
		scanf("%d", &idade[i]);
		
		system("cls");
	
	}//fechando for
	
	printf("EXIBINDO BASE DE DADOS\n\n");
	
	for(i=0; i<7;i++){		
		printf("%s \t %d \t anos\n",nome[i], idade[i]);
		_sleep(300);
	}

	printf("\n\n");
	system("pause");
}

