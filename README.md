Have XAMPP preinstalled.  
Start Apache and MySQL from the XAMPP control panel.  
Download then extract.  
Import the database commerce.sql located in the db folder into the localhost phpMyAdmin.  
In the command line or windows powershell, type the following commands for the kmeans algorithm library and mysql connector for python,  
-> pip3 install mysql-connector  
-> pip3 install -U scikit-learn spicy matplotlib  
  On the XAMPP control panel, open the file php.ini in Apache->config and add the following line if it doesn't exist,  
  -> safe_mode_exec_dir=off  
  This should enable running of the python file via command prompt by the PHP file.  
  Open "start" and search "app execution aliases". Turn off 'app installers' for python so they are not invoked by the python3 keyword when running python files via command prompt.
