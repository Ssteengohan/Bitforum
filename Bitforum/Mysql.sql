CREATE DATABASE Terabit;

CREATE TABLE Post(
 id int NOT NULL AUTO_INCREMENT primary key,
 Titel varchar(755) NOT NULL,
 Taal varchar(255) NOT NULL,
 Code   text NOT NULL, 
 IMG LONGBLOB NOT NULL,
 link varchar(255) NOT NULL,
 date datetime not null,
 User varchar(255) NOT NULL
);

CREATE TABLE Vragen(
 id int NOT NULL AUTO_INCREMENT primary key,
 Titel varchar(755) NOT NULL,
 Taal varchar(255) NOT NULL,
 Code   text NOT NULL, 
 Vraag varchar(7500) NOT NULL,
 date datetime not null,
 User varchar(255) NOT NULL
);

CREATE TABLE comments (
    cid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) NOT NULL,
    date datetime NOT NULL,
    message TEXT NOT NULL,
    post_id int(11) NOT NULL,
    likes int(11) NOT NULL
);

 CREATE TABLE IF NOT EXISTS `likes` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `user` varchar(255) NOT NULL,  
  `comid` int(11) NOT NULL,  
  `type` varchar(10) NOT NULL
  PRIMARY KEY (`id`)  
 );

 
CREATE TABLE gebruikers(
    userID int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Naam varchar(255) NOT NULL,
    Achternaam varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    username varchar(255) NOT NULL,
    wachtwoord varchar(50) NOT NULL
);
