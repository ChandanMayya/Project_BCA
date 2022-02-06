#include<stdio.h>
int main(){
	int top=-1,max,s[10],choice,ele,i;
	printf("Enter the max of the stack (<10):\t");
	scanf("%d",&max);
	while(1)
	{
		printf("******************************************\n");
		printf("********* MENU *********\n");
		printf("1. Push \t 2. Pop \n3. Display \t 4. Exit\n Enter your choice:\t");
		scanf("%d",&choice);
	
		switch(choice){
		case 1:
			if(top<max-1){
				top++;
				printf("Enter the element to Push:\t");
				scanf("%d",&ele);
				s[top]=ele;
				printf("Element Pushed..\n");
			}else{
				printf("Stack Overflow!\n");
			}
			break;
		case 2:
			if(top!=-1){
				ele=s[top];
				top--;
				printf("Top element %d poped..\n",ele);
			}else{
				printf("Too low elements to pop!\n");
			}
			break;
		case 3:
			if(top!=-1){
				printf("The elements of the stack are:\n");
				for(i=top;i>=0;i--)
					printf("|\t%d\t|\n",s[i]);
				printf("+---------------+\n");
			}else{
				printf("Too low elements to display!\n");
			}
			break;
		case 4:
			return 0;
		default:
			printf("Invalid input..\n");
		}
	}
}		
			
