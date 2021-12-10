#importing relevant libraries
#!/usr/bin/env python
import sys ###new
import mysql.connector
from sklearn.cluster import KMeans
import numpy as np

#establish a connection to the database
conn = mysql.connector.connect(host='localhost', database='commerce', user='root', password='')

#cursor to handle SQL statements
mycursor=conn.cursor()

mycursor.execute("SELECT * FROM transactionitems")

##for i in mycursor:
    ##print(i)

##X=np.array([[1,1,0],[1,0,1],[1,0,1],[1,1,1],[0,0,1],[0,0,0],[0,0,0],])

##kmeans=KMeans(n_clusters=3)
##kmeans.fit(X)
##print(kmeans.labels_)

results=mycursor.fetchall()
cols=zip(*results)
outlist=[]
for col in cols:
    arr=np.asarray(col)
    type=arr.dtype
    outlist.append(np.asarray(arr, np.int32))

outlist.pop(0)

##for i in outlist:
    ##print(i)

kmeans=KMeans(n_clusters=5)
kmeans.fit(outlist)
##print(kmeans.labels_)

##print (sys.argv[1])
#k=2
numberargs=int(sys.argv[1]);
k=1;
similar=[];


while k<=numberargs:
    ##idval = int(input("Enter your value: "))
    idval=int(sys.argv[k+1])
    idval-=1
    j=0
    while j < len(kmeans.labels_):
        if kmeans.labels_[j]==kmeans.labels_[idval] and j!=idval:
            similar.append(j+1)
        j+=1
    k+=1;

unique_ids = list(set(similar))
print(unique_ids)
