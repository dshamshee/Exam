#include <stdio.h>
#define MAX 5  // Maximum size of the queue

// Function prototypes for Simple Queue
void simpleEnqueue(int);
int simpleDequeue();
void displaySimpleQueue();

// Function prototypes for Circular Queue
void circularEnqueue(int);
int circularDequeue();
void displayCircularQueue();

// Simple Queue variables
int simpleQueue[MAX];
int frontSimple = -1, rearSimple = -1;

// Circular Queue variables
int circularQueue[MAX];
int frontCircular = -1, rearCircular = -1;

int main() {
    int choice, value;

    // Menu for Simple and Circular Queue operations
    while (1) {
        printf("\nQueue Operations Menu:\n");
        printf("1. Insert in Simple Queue\n2. Remove from Simple Queue\n3. Display Simple Queue\n");
        printf("4. Insert in Circular Queue\n5. Remove from Circular Queue\n6. Display Circular Queue\n7. Exit\n");
        printf("Enter your choice: ");
        scanf("%d", &choice);

        switch (choice) {
            case 1:
                printf("Enter the value to insert in Simple Queue: ");
                scanf("%d", &value);
                simpleEnqueue(value);
                break;
            case 2:
                value = simpleDequeue();
                if (value != -1)
                    printf("Removed value from Simple Queue: %d\n", value);
                break;
            case 3:
                displaySimpleQueue();
                break;
            case 4:
                printf("Enter the value to insert in Circular Queue: ");
                scanf("%d", &value);
                circularEnqueue(value);
                break;
            case 5:
                value = circularDequeue();
                if (value != -1)
                    printf("Removed value from Circular Queue: %d\n", value);
                break;
            case 6:
                displayCircularQueue();
                break;
            case 7:
                printf("Exiting...\n");
                return 0;
            default:
                printf("Invalid choice! Please try again.\n");
        }
    }
    return 0;
}

// Simple Queue Functions
void simpleEnqueue(int value) {
    if (rearSimple == MAX - 1) {
        printf("Simple Queue Overflow! Cannot insert %d.\n", value);
    } else {
        if (frontSimple == -1) {
            frontSimple = 0;  // Set front to 0 if first insertion
        }
        simpleQueue[++rearSimple] = value;
        printf("%d inserted into Simple Queue.\n", value);
    }
}

int simpleDequeue() {
    if (frontSimple == -1 || frontSimple > rearSimple) {
        printf("Simple Queue Underflow! Cannot remove.\n");
        return -1;
    } else {
        int value = simpleQueue[frontSimple++];
        if (frontSimple > rearSimple) {  // Reset queue if empty
            frontSimple = rearSimple = -1;
        }
        return value;
    }
}

void displaySimpleQueue() {
    if (frontSimple == -1) {
        printf("Simple Queue is empty!\n");
    } else {
        printf("Simple Queue elements are:\n");
        for (int i = frontSimple; i <= rearSimple; i++) {
            printf("%d ", simpleQueue[i]);
        }
        printf("\n");
    }
}

// Circular Queue Functions
void circularEnqueue(int value) {
    if ((rearCircular + 1) % MAX == frontCircular) {
        printf("Circular Queue Overflow! Cannot insert %d.\n", value);
    } else {
        if (frontCircular == -1) {
            frontCircular = 0;  // Set front to 0 if first insertion
        }
        rearCircular = (rearCircular + 1) % MAX;
        circularQueue[rearCircular] = value;
        printf("%d inserted into Circular Queue.\n", value);
    }
}

int circularDequeue() {
    if (frontCircular == -1) {
        printf("Circular Queue Underflow! Cannot remove.\n");
        return -1;
    } else {
        int value = circularQueue[frontCircular];
        if (frontCircular == rearCircular) {
            // Reset queue if empty
            frontCircular = rearCircular = -1;
        } else {
            frontCircular = (frontCircular + 1) % MAX;
        }
        return value;
    }
}

void displayCircularQueue() {
    if (frontCircular == -1) {
        printf("Circular Queue is empty!\n");
    } else {
        printf("Circular Queue elements are:\n");
        int i = frontCircular;
        while (1) {
            printf("%d ", circularQueue[i]);
            if (i == rearCircular)
                break;
            i = (i + 1) % MAX;
        }
        printf("\n");
    }
}
