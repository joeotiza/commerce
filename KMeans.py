#importing relevant libraries
#!/usr/bin/env python
import sys
import mysql.connector
from sklearn.cluster import KMeans
import numpy as np

#establish a connection to the database
conn = mysql.connector.connect(host='localhost', database='commerce', user='root', password='')

#cursor to handle SQL statements
mycursor=conn.cursor()

mycursor.execute("SELECT * FROM transactionitems")

#disconnect from server as we are running no more MySQL queries
conn.close()

##for i in mycursor:
    ##print(i)

##X=np.array([[1,1,0],[1,0,1],[1,0,1],[1,1,1],[0,0,1],[0,0,0],[0,0,0],])

##kmeans=KMeans(n_clusters=3)
##kmeans.fit(X)
##print(kmeans.labels_)

#fetch each column as an array
results=mycursor.fetchall()
cols=zip(*results)
outlist=[]
for col in cols:
    arr=np.asarray(col)
    type=arr.dtype
    outlist.append(np.asarray(arr, np.int32))

#pop the first array with the transaction IDs
outlist.pop(0)

##for i in outlist:
    ##print(i)

#n_clusters is the number of clusters items will be grouped into
#fit the arrays into their relevant clusters using kmeans.fit
kmeans=KMeans(n_clusters=9)
kmeans.fit(outlist)
##print(kmeans.labels_)

##print (sys.argv[1])
#k=2

#sys.argv[k] are the inputs passed via command line
numberargs=int(sys.argv[1]);#no. of items in cart
k=1;
similar=[];#array holding IDs of items in the same cluster


while k<=numberargs:
    ##idval = int(input("Enter your value: "))
    idval=int(sys.argv[k+1])
    idval-=1#decrement since indices of array start at 0, not 1
    j=0
    while j < len(kmeans.labels_):
        if kmeans.labels_[j]==kmeans.labels_[idval] and j!=idval:
            similar.append(j+1)
        j+=1
    k+=1;

unique_ids = list(set(similar))#eliminate duplicate IDs from the array
print(unique_ids)
