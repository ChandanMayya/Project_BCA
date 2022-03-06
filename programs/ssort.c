#include<stdio.h>

int a[10],n;
void ssort();
void ssort(){
	int i,j,temp,min;
	for(i=n-1;i>0;i--)
	{
		min=i;
		for(j=1;j<=i;j++)
			if(a[min]>a[j])
				min=j;
		temp=a[min];
		a[min]=a[i];
		a[i]=temp;
	}
}
int main(){
	int i;
	printf("Enter the number of elements:\t");
	scanf("%d",&n);
	printf("Enter the array elements:\t");
	for(i=0;i<n;i++)
		scanf("%d",&a[i]);
	ssort();
	printf("\nThe sorted array is:\t");
	for(i=0;i<n;i++)
		printf("%d\t",a[i]);

	return 0;
}
