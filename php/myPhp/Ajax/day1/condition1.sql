#创建用户信息   姓名 varchar(20) primary key auto_increment   电话 char(11) not null    性别 char(2) default  not null  '男'  图片 varchar(100) not null

set names gbk;

create database user;

use user;

create table us (
  id int primary key auto_increment,
  name varchar(10) not null unique key,
  tel char(11) not null,
  sex char(2) default '中'
) charset gbk;

insert into us values (null, 'long', '13476681758', '男'),
  (null, '孽海花', '15549446666', '女'),
  (null, '落花殇', '17749447766', '女'),
  (null, '妖猫传', '15548881888', '男');