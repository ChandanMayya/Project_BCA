#include<stdio.h>
#include<ctype.h>

char postfix[50],infix[50],stack[50];
int top=-1;
void push(char);
char pop();
void infitopost();
int precedence(char);

void push(char a){
	stack[++top]=a;
}

char pop(){
	char a;
	a=stack[top--];
	return a;
}

int precedence(char a){
	switch(a){
		case '(':
		case ')': return 0;
		case '-':
		case '+': return 1;
		case '*':
		case '/': return 2;
	}
}

void infitopost(){
	
	char ele;
	int a=0,b=0;
	while((ele=infix[a++])!='\0'){
	//puts(stack);
	
		if(ele=='(')
			push('(');
		else if(ele==')')
			while(stack[top]!='(')
			{	
				postfix[b++]=pop();
			}
		else if(isalnum(ele))
			postfix[b++]=ele;	
		else{
			while(precedence(ele)<precedence(stack[top]))
				postfix[b++]=pop();
			push(ele);
		}
	}
	while(stack[top]!='$')
	{
		if(stack[top]=='('){top--;continue;}
		postfix[b++]=pop();
	}
}

void main(){
	
	printf("Enter a Postfix expression:\t");
	push('$');
	gets(infix);
	infitopost();
	printf("The postfix expression is:\t");
	puts(postfix);	
	puts(stack);
}
