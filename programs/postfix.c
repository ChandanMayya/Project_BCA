#include<stdio.h>
#include<string.h>

void push(char);
int pre(char);
void evaluation();
char pop();

int top = 0;
char prefix[50], stack[50], postfix[50];

void main() {
	printf("Enter the infix exp:");
	scanf("%s", prefix);
	evaluation();
	printf("The postfix exp:");
	puts(postfix);
}

void push(char ch) {
	stack[++top] = ch;
}

char pop() {
	return stack[top--];
}

int pre(char c) {
	switch(c) {
		case '(' : 
		case ')' : return 0;
		case '+' :
		case '-' : return 1;
		case '*' :
		case '/' : return 2;
		case '^' : return 3;
	}
}

void evaluation() {
	int i = 0, r = 0;
	char symbol;
	while ((symbol = prefix[i++]) != '\0') {
		if (symbol == '(') {
			push('(');
		} else if (symbol == ')') {
			while (stack[top] != '(') {
				postfix[r++] = pop();
			}	
			if (stack[top] == '(') {
				pop();
			}
		} else if (symbol == '+' || symbol == '-' || symbol == '/' || symbol == '*' || symbol == '^') {
			while (pre(stack[top]) >= pre(symbol)) {
				postfix[r++] = pop();
			}
			push(symbol);
		} else {
			postfix[r++] = symbol;
		}
	}
	while (top != 0) {
		if (stack[top] == '(' || stack[top] == ')') {
			top--;
		} else {
			postfix[r++] = pop();
		}
	}
}
