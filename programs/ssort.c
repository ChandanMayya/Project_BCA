#include<stdio.h>
int main(){
	int a[10],n,i,j,temp,min;
	printf("Enter the number of elements:\t");
	scanf("%d",&n);
	printf("Enter the array elements:\t");
	for(i=0;i<n;i++)
		scanf("%d",&a[i]);
	
	for(i=0;i<n;i++)
	{
		min=i;
		for(j=i+1;j<n;j++)
			if(a[min]>a[j])
				min=j;
		temp=a[min];
		a[min]=a[j];
		a[j]=temp;
	}
	printf("\nThe sorted array is:\t");
	for(i=0;i<n;i++)
		printf("%d\t",a[i]);

	return 0;
}
