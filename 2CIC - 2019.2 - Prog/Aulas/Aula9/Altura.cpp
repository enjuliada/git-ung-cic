#include<stdio.h>
#include<stdlib.h>

int main(){
	float ana=1.12, carlos=0.82;
	int ano=0;
	
	while(carlos<ana){
		ana+=0.03;
		carlos+=0.05;
		ano++;
	}
	
	printf("Anos: %d\n", ano);
	printf("Ana: %.2f\n", ana);
	printf("Carlos: %.2f\n", carlos);
	
}
