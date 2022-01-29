
CREATE DATABASE isproject2;
USE isproject2;

CREATE TABLE donortable (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    l_name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    code mediumint(50) NOT NULL,
    status text NOT NULL
    
    
);

CREATE TABLE admintable (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    code mediumint(50) NOT NULL,
    status text NOT NULL
    
    
);


CREATE TABLE HOtable (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    code mediumint(50) NOT NULL,
    status text NOT NULL
    
    
);

CREATE TABLE dispatchtable (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    code mediumint(50) NOT NULL,
    status text NOT NULL
    
    
);


CREATE TABLE FoodDonation (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    foodname varchar(255) NOT NULL,
    foodimage VARCHAR(100) NOT NULL,
    item varchar(255) NOT NULL,
    quantity INT(100) NOT NULL,
    foodlocation VARCHAR(255) NOT NULL,
    fooddescription text NOT NULL,
    foodstatus VARCHAR(255) NOT NULL,
    donorid int, 
    Foreign Key(donorid) REFERENCES donortable(id)

    
);



CREATE TABLE Aiddonations (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    itemname VARCHAR(100) NOT NULL,
    itemimage VARCHAR(100) NOT NULL,
    itemdescription VARCHAR(100) NOT NULL,
    location VARCHAR(255) NOT NULL,
    itemquantity VARCHAR(100) NOT NULL,
    itemstatus VARCHAR(255) NOT NULL
    donorid int, 
    Foreign Key(donorid) REFERENCES donortable(id)

   
);



CREATE TABLE postednews (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    content VARCHAR(100) NOT NULL,
    publisher VARCHAR(100) NOT NULL,
    dateandtime VARCHAR(255) NOT NULL,
    organizationid int, 
    Foreign Key(organizationid) REFERENCES HOtable(id)

   
);





CREATE TABLE foodoritemdonationstatus (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    selecteddestination VARCHAR(255) NOT NULL,
    foodoritemdonated VARCHAR(100) NOT NULL,
    dispatchdestination VARCHAR(100) NOT NULL,
    donorid int,
    Foreign Key(donorid) REFERENCES donortable(id)

);




CREATE TABLE cashdonations 
( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
name VARCHAR(100) NOT NULL, 
dateandtime VARCHAR(255) NOT NULL, 
Amount VARCHAR(100) NOT NULL, 
phonenumber VARCHAR(255) NOT NULL, 
donorid int, Foreign Key(donorid) REFERENCES donortable(id) );

