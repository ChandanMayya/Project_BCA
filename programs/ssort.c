#include<stdio.h>
int a[10],n;
void ssort();
void ssort(){
	int i,j,temp,min;
	for(i=0;i<n;i++)
	{
		min=i;
		for(j=i+1;j<n;j++)
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
	printf("\nThe sorted array is:\t");
	for(i=0;i<n;i++)
		printf("%d\t",a[i]);

	return 0;
}
