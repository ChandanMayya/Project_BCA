#include<stdio.h>
int a[10],n;
void bsort(){
	int i,j,temp;
	for(i=0;i<n;i++)
		for(j=0;j<n-i-1;j++)
			if(a[j]>a[j+1])
			{
				temp=a[j];
				a[j]=a[j+1];
				a[j+1]=temp;
			}
}
int main(){
	int i;
	printf("Enter the Number of elements:\t");
	scanf("%d",&n);
	printf("Enter the array elements:\t");
	for(i=0;i<n;i++)
		scanf("%d",&a[i]);
	bsort();
	printf("The sorted array is:\t");
	for(i=0;i<n;i++)
		printf("%d\t",a[i]);	
	return 0;
}
