
create USER kondo IDENTIFIED BY '123456789';

GRANT ALL ON privileges yoyakudb.* TO 'kondo'@'localhost';


create database yoyakudb character set utf8 collate utf8_general_ci;


create table users( 
    user_id int(5)NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(25) NOT NULL, 
    email VARCHAR(35) NOT NULL, 
    password VARCHAR(60) NOT NULL, 
    birth_year INT(4) NOT NULL, 
    UNIQUE(email) 
    );
create table search (  
    number int(5) PRIMARY KEY AUTO_INCREMENT, 
    name varchar(255) NOT NULL,  
    address varchar(255),  
    jannru varchar(20) NOT NULL 
 );



