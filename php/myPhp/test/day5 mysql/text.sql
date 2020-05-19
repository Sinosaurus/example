
create datebase text ;
use text ;
create table tex (
  id int primary key auto_increment,
  cid int not null,
  name varchar(20) not null unique key,
  price decimal(7) not null default "100",
  date date
);
create table texson (
  id int primary key auto_increment,
  te_name varchar(20) not null,
  other char(10)
);
insert into texson values (null, '王林',200),
                      (null, '苏铭',200),
                      (null,  '张飒',100 );