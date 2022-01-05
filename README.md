# EasyBuy
**A RECOMMENDER SYSTEM FOR A WEB BASED E-COMMERCE PLATFORM USING K-MEANS CLUSTERING**

## Prerequisites

Have **XAMPP** and **Python 3.X** preinstalled.

Start **Apache** and **MySQL** from the XAMPP control panel.

Download then extract.  
Create a database named ```commerce``` in phpMyAdmin.  
Import the database *commerce.sql* located in the db folder into the localhost phpMyAdmin ```commerce``` database. 

In the command line or windows powershell, type the following commands for the kmeans algorithm library and mysql connector for python,  
- ```pip3 install mysql-connector```  
- ```pip3 install -U scikit-learn spicy matplotlib```  

On the XAMPP control panel, open the file *php.ini* in *Apache->config* and add the following line if it doesn't exist,  
- ```safe_mode_exec_dir=off```  
This should enable running of the python file via command prompt by the PHP file. 
  
Open **Start** and search **app execution aliases**. Turn off **app installers** for python so they are not invoked by the ```python3``` keyword when running python files via command prompt.
  
## Developed on:  
- PHP version 8.0.13  
- Python version 3.9

## Demonstration

To run the customer/default module type ```localhost/commerce``` on the address bar  
To run the admin module type ```localhost/commerce/admin``` (username:admin)(password:admin)

Use **PayPal sandbox** to create simulation accounts for payments via PayPal.
