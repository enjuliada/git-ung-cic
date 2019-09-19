#include<stdio.h>
#include<stdlib.h>
#include<string.h>
#include<locale.h>

int main(){
	//declaração das variaveis
	int nivel, contagem=0;
	float altura, menor;
	
	int qA=0, qB=0, qC=0, qD=0;
	
		
	//desenvolvimento	
	setlocale(LC_ALL,"");
	
	do{
	
	printf("**** PROGRAMA ATLETAS ****\n\n");
	
	printf("Informe a Altura do Atleta (0 para sair): ");
	scanf("%f", &altura);

	
	if(altura == 0){
		break;
	}
	contagem++;
	if(contagem == 1){
		menor = altura;
	}
	
	 if(altura<menor){
		menor = altura;
	}
	
	if (altura <= 1.7){
		qA++;		
	}else if(altura <= 1.8){
		qB++;
	}else if(altura <= 1.9){
		qC++;
	}else{
		qD++;
	}
	
	system("cls");
	
	}while(altura != 0);
	
	system("cls");
	
	printf("**** PROGRAMA ATLETAS ****\n\n");
	printf("NÍVEL\t\tATLETAS\n");
	printf("------------------------------------\n");
	printf("A\t\t%d\n", qA);
	printf("B\t\t%d\n", qB);
	printf("C\t\t%d\n", qC);
	printf("D\t\t%d\n\n\n", qD);
	
	printf("O atleta eliminado mede %.2f.\n",menor);
	printf("Restaram %d atletas na equipe.", contagem-1);
	
	
	
	//finalização
	printf("\n\n");
	system("pause");
	
	
}



