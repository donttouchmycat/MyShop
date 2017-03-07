CREATE DATABASE myshop;
use myshop;
CREATE TABLE my_admin(
id tinyint unsigned auto_increment key,
username varchar(20) not null unique,
password char(32) not null,
email varchar(50) not null
);
CREATE TABLE my_cate(
id smallint unsigned auto_increment key,
cName varchar(50) unique
);

CREATE TABLE my_pro(
id int unsigned auto_increment key,
pName varchar(50) not null unique,
pSn varchar(50) not null,
pNum int unsigned default 1,
mPrice decimal(10,2) not null,
iPrice decimal(10,2) not null,
pDesc text,
pImg varchar(50) not null,
pubTime int unsigned not null,
isShow tinyint(1) default 1,
isHot tinyint(1) default 0,
cId smallint unsigned not null
);

CREATE TABLE my_user(
id int unsigned auto_increment key,
username varchar(20) not null unique,
password char(32) not null,
sx enum("man","woman","secret") not null default "secret",
face varchar(50) not null,
regTime int unsigned not null
 );
 
 CREATE TABLE my_album(
 id int unsigned auto_increment key,
 pid int unsigned not null,
 albumpath varchar(50) not null
 );