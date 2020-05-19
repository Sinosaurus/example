-- #注释
create table job(
  stu_id int,
  stu_name varchar(10),
  stu_sex char(2),
  stu_company varchar(20),
  stu_salary float(7, 2) ,/*7数字，2为小数点*/
  stu_time date comment '毕业时间'
);

-- 创建学生表
create table student(
  stu_id int,
  stu_name varchar(10),
  sex char(2),
  age tinyint,
  birthday date comment '生日',
  city varchar(10),
  tel char(11),
  wechar varchar(30)
);

-- 创建个人信息
create table stu_pos(
  stu_id int,
  stu_name varchar(5),
  stu_position text,
  stu_birthday datetime,
  stu_tel char(11)
);