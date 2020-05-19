create table lona(
  lon_id int primary key auto_increment comment '索引',--不能为空,而且唯一 类似js中id
  --不进行手动设置 使其自动设置 auto-increment 字段自动增长 必须为key
  --唯一键 unique key 当前只能唯一 不能重复  商品名 文章名等  字段可以为空
  lon_a int not null,
  lon_b varchar(12) not null default "男",
  lon_c char(6),
  lon_d date
);

create table stusa ( --由于使用了中文名，必须设置字符集为gbk ，不然就报错
  stu_id int primary key auto_increment,
  stu_name varchar(10) not null unique key,/*--唯一键*/
  stu_sex char(2) not null default "人妖",/*--默认为*/
  stu_company varchar(25) comment "名称",
  stu_salary decimal(5,2) not null default 11,
  stu_time datetime
);

create table suu (
  su_id int primary key auto_increment,
  su_name varchar(5) not null unique key,
  stu_sex char (2) not null default "中",
  stu_com varchar(20) comment "名称",
  stu_money decimal(7,3) not null default "300",
  stu_time datetime
);







