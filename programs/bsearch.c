#include<stdio.h>
int main(){
	int a[10],n,i,se,mid,low,high;
		printf("Enter the number of elements:\t");
		scanf("%d",&n);
		printf("Enter the array elements:\t");
		for(i=0;i<n;i++)
			scanf("%d",&a[i]);
		printf("Enter the search element:\t");
		scanf("%d",&se);
		low=0;
		high=n-1;
		while(low<=high)
		{
			mid=(low+high)/2;
			if(a[mid]==se)
			{
				printf("Element found at location:\t%d",mid);
				return 1;
			}
			else if(se<a[mid])
				high=mid-1;
			else
				low=mid+1;
		}
		printf("Element not found!");
}
