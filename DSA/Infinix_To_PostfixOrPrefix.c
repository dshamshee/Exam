#include <stdio.h>
#include <string.h>
#include <ctype.h>
#define MAX 100

// Stack structure
char stack[MAX];
int top = -1;

// Function prototypes
void push(char);
char pop();
int precedence(char);
int isOperator(char);
void infixToPostfix(char[], char[]);
void infixToPrefix(char[], char[]);
void reverseString(char[]);

int main() {
    char infix[MAX], postfix[MAX], prefix[MAX];

    printf("Enter an infix expression: ");
    scanf("%s", infix);

    // Convert infix to postfix
    infixToPostfix(infix, postfix);
    printf("Postfix Expression: %s\n", postfix);

    // Convert infix to prefix
    infixToPrefix(infix, prefix);
    printf("Prefix Expression: %s\n", prefix);

    return 0;
}

// Function to push an element onto the stack
void push(char c) {
    if (top == MAX - 1) {
        printf("Stack overflow!\n");
    } else {
        stack[++top] = c;
    }
}

// Function to pop an element from the stack
char pop() {
    if (top == -1) {
        return '\0';  // Return null character if stack is empty
    } else {
        return stack[top--];
    }
}

// Function to return the precedence of operators
int precedence(char c) {
    switch (c) {
        case '+':
        case '-':
            return 1;
        case '*':
        case '/':
            return 2;
        case '^':
            return 3;
        default:
            return 0;
    }
}

// Function to check if a character is an operator
int isOperator(char c) {
    return (c == '+' || c == '-' || c == '*' || c == '/' || c == '^');
}

// Function to convert infix to postfix
void infixToPostfix(char infix[], char postfix[]) {
    int i = 0, j = 0;
    char c;

    while (infix[i] != '\0') {
        // If character is an operand, add it to the output
        if (isalnum(infix[i])) {
            postfix[j++] = infix[i];
        }
        // If character is '(', push it to the stack
        else if (infix[i] == '(') {
            push(infix[i]);
        }
        // If character is ')', pop and add to output until '(' is encountered
        else if (infix[i] == ')') {
            while (top != -1 && stack[top] != '(') {
                postfix[j++] = pop();
            }
            pop(); // Remove '(' from stack
        }
        // If an operator is encountered
        else if (isOperator(infix[i])) {
            while (top != -1 && precedence(stack[top]) >= precedence(infix[i])) {
                postfix[j++] = pop();
            }
            push(infix[i]);
        }
        i++;
    }

    // Pop all remaining operators from the stack
    while (top != -1) {
        postfix[j++] = pop();
    }
    postfix[j] = '\0'; // Null-terminate the string
}

// Function to convert infix to prefix
void infixToPrefix(char infix[], char prefix[]) {
    char temp[MAX], postfix[MAX];
    int i, j = 0;

    // Step 1: Reverse the infix expression
    strcpy(temp, infix);
    reverseString(temp);

    // Step 2: Replace '(' with ')' and vice versa
    for (i = 0; temp[i] != '\0'; i++) {
        if (temp[i] == '(') {
            temp[i] = ')';
        } else if (temp[i] == ')') {
            temp[i] = '(';
        }
    }

    // Step 3: Convert modified infix to postfix
    infixToPostfix(temp, postfix);

    // Step 4: Reverse the postfix expression to get the prefix expression
    reverseString(postfix);
    strcpy(prefix, postfix);
}

// Function to reverse a string
void reverseString(char str[]) {
    int i, j;
    char temp;
    for (i = 0, j = strlen(str) - 1; i < j; i++, j--) {
        temp = str[i];
        str[i] = str[j];
        str[j] = temp;
    }
}
