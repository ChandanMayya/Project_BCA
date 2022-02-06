#include<stdio.h>

char postfix[50],infix[50],stack[50];
int top=-1;

void inftopost();
void push(char);
char pop();
int preceed(char);

void inftopost(){
	char symbol;
	int i=0,k=0;
	while(symbol=infix[i++]!='\0'){
		if(symbol=='(')
			push('(');
		else if(symbol==')')
			while(stack[top]!='(')
				postfix[k++]=pop();
		else if((symbol=='+')||(symbol=='-')||(symbol=='/')||(symbol=='*')){
			while(preceed(stack[top])>=preceed(symbol))
				postfix[k++]=pop();
			push(symbol);
		}else{
			postfix[k++]=symbol;	
		}				
	}	
}

void push(char symbol){
	stack[top++]=symbol;
}

char pop(){
	char ele;
	ele=stack[top--];
	return ele;
}

int preceed(char symbol){
	switch(symbol){
		case '(': return 0;
		case '+':
		case '-': return 1;
		case '/':
		case '*': return 2;
	}	
}

void main(){
	printf("Enter the infix expression:\t");
	gets(infix);
	push("$");
	inftopost();
	printf("The postfix expression is:\t");
	puts(postfix);
}
	

