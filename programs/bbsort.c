#include<stdio.h>
int main(){
	int a[10],n,i,j,temp;
	printf("Enter the Number of elements:\t");
	scanf("%d",&n);
	printf("Enter the array elements:\t");
	for(i=0;i<n;i++)
		scanf("%d",&a[i]);
	
	for(i=0;i<n;i++)
		for(j=0;j<n-i-1;j++)
			if(a[j]>a[j+1])
			{
				temp=a[j];
				a[j]=a[j+1];
				a[j+1]=temp;
			}
	printf("The sorted array is:\t");
	for(i=0;i<n;i++)
		printf("%d\t",a[i]);	
	return 0;
}