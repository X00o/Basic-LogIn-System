# Basic-LogIn-System
You can sign up the log in then log out . 

First of all you have to install XAMPP and start the apache server and start the MySql service and click on the admin button in the XAMPP control panal 



and oper rhe SQL query section and paste this code .=>



CREATE DATABASE users; 
CREATE table users( 
    sno int AUTO_INCREMENT PRIMARY, 
    username varchar(27) UNIQUE, 
    password varchar(255) UNIQUE, 
    dt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    PRIMARY KEY(sno) 
);




 you will get the code in the databasecode.txt file above .
 
