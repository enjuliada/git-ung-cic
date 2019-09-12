#include<stdio.h>
#include<stdlib.h>
#include<locale.h>
#include<string.h>

int main(){
	
	int codLanche, codAcomp, codBeb;
	char nomeLanche[20], nomeAcomp[20], nomeBeb[20], resp;
	float total = 0;
	
	setlocale(LC_ALL,"");
	
	do{	
	
	printf("***** PROGRAMA LANCHONETE *****\n\n");
	
	printf("Entre com o código do lanche:\n");
	printf("-------------------------------------------------\n");
	printf("Código\t\tLanche\t\t\tPreço\n\n");
	printf("1\t\tPão na chapa\t\tR$ 2,50\n");
	printf("2\t\tBauru\t\t\tR$ 3,50\n");
	printf("3\t\tHot-dog\t\t\tR$ 5,00\n");
	printf("4\t\tX-Burguer\t\tR$ 6,50\n");
	printf("5\t\tX-Tudo\t\t\tR$ 10,00\n\n");
	printf("Código: ");
	scanf("%d", &codLanche);
	
	system("cls");//limpa a tela
	
	printf("***** PROGRAMA LANCHONETE *****\n\n");
	printf("Entre com o código do acompanhamento:\n");
	printf("-------------------------------------------------\n");
	printf("Código\t\tAcomp.\t\t\tPreço\n\n");
	printf("1\t\tBatata-frita\t\tR$ 5,00\n");
	printf("2\t\tPolenta\t\t\tR$ 7,00\n");
	printf("3\t\tCamarão\t\t\tR$ 12,00\n");
	printf("Código: ");
	scanf("%d", &codAcomp);

	system("cls");

	printf("***** PROGRAMA LANCHONETE *****\n\n");
	printf("Entre com o código da bebida:\n");
	printf("-------------------------------------------------\n");
	printf("Código\t\tBebida.\t\t\tPreço\n\n");
	printf("1\t\tÁgua\t\t\tR$ 2,00\n");
	printf("2\t\tPingado\t\t\tR$ 3,00\n");
	printf("3\t\tRefrigerante\t\tR$ 5,00\n");
	printf("Código: ");
	scanf("%d", &codBeb);
	
	system("cls");
	
	if(codLanche == 1){
		strcpy(nomeLanche, "PAO NA CHAPA"); //nome="pao" (ERRADO)
		total = total + 2.5;
	}else if(codLanche == 2){
		strcpy(nomeLanche, "BAURU"); 
		total = total + 3.5;
	}else if(codLanche == 3){
		strcpy(nomeLanche, "HOT-DOG"); 
		total = total + 5;
	}else if(codLanche == 4){
		strcpy(nomeLanche, "X-BURGUER"); 
		total = total + 6.5;
	}else if(codLanche == 5){
		strcpy(nomeLanche, "X-TUDO"); 
		total = total + 10;
	}else{
		strcpy(nomeLanche, "NENHUM LANCHE"); 		
	}
	
	if(codAcomp == 1){	
		strcpy(nomeAcomp, "BATATA-FRITA"); 
		total = total + 5;
		
	}else if(codAcomp == 2){
		strcpy(nomeAcomp, "POLENTA"); 
		total = total + 7;
	}
	else if(codAcomp == 3){
		strcpy(nomeAcomp, "CAMARÃO"); 
		total = total + 12;
	
	}else{
		strcpy(nomeAcomp, "NENHUM ACOMPANHAMENTO"); 
	}
	
	if(codBeb == 1){	
		strcpy(nomeBeb, "ÁGUA"); 
		total = total + 2;
		
	}else if(codBeb == 2){
		strcpy(nomeBeb, "PINGADO"); 
		total = total + 3;
	}
	else if(codBeb == 3){
		strcpy(nomeBeb, "REFRIGERANTE"); 
		total = total + 5;
	
	}else{
		strcpy(nomeBeb, "NENHUMA BEBIDA"); 
	}
			
		//Exibição final dos dados
		printf("***** PROGRAMA LANCHONETE *****\n\n");
		printf("*** COMBO ESCOLHIDO***\n\n");
		printf("(%s + ", nomeLanche);
		printf("%s + ", nomeAcomp);
		printf("%s) \n\n", nomeBeb);
		
		printf("Total a Pagar: R$ %.2f\n\n", total);
		
		printf("Efetuar nova venda? (s/n) ");
		scanf("%s",&resp);
		
		system("cls");
		
	}while(resp == 's');
	
	printf("\n\n");
	system("pause");
	
}


