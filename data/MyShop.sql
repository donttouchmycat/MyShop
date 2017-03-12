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

face varchar(50) not null,
regTime int unsigned not null
 );

 CREATE TABLE my_album(
 id int unsigned auto_increment key,
 pid int unsigned not null,
 albumpath varchar(50) not null
 );

 CREATE TABLE my_userdet(
 id int unsigned auto_increment key,
 uid int unsigned not null,
 sex enum("男","女","保密") default "保密", )
-- aname varchar(20),
-- rname varchar(20),
-- phone varchar(20),
-- aname varchar(10)
-- rname varchar(10),
-- year varchar(5),
-- month varchar(5),
-- day varchar(5)

 CREATE TABLE address_list(
  id int unsigned auto_increment key,
  did int unsigned not null
 );

 CREATE TABLE address(
  id int unsigned auto_increment key,
  aid int unsigned not null,
  name varchar(20),
  phone varchar(20),
  province varchar(10),
  city varchar(10),
  region varchar(10),
  def tinyint(1) default 0,
  addesc text
 )

 CREATE TABLE attr_key(
 	id int unsigned auto_increment key,
 	item_id int(10) unsigned not null,
 	attr_name varchar(50) not null
 )

 CREATE TABLE attr_val(
 	key_id INT(10) UNSIGNED NULL DEFAULT NULL,
 	item_id int(10) UNSIGNED NULL DEFAULT NULL,
 	symbol int(10) ,
 	attr_value varchar(255)
 )

 CREATE TABLE attr_path(
 	id int unsigned auto_increment key,
 	item_id int(10) UNSIGNED NULL DEFAULT NULL,
 	sprice double(15,2)
 )