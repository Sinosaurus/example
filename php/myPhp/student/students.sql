# 创建库
create database students charset utf8;

use students;
# 班级表
# 班级编号  班级名称  学习专业  班主任姓名 开班时间
create table class(
  class_id int primary key auto_increment,
  class_name varchar(15) not null,
  specialty varchar(10) not null,
  head_teacher char(4),
  begin_time date
);
# 插入数据
insert into class values
  (null, '12期', '前端web开发', '李帆',    '2017-9-28' ),
  (null, '22期', 'java',        '慕云海',  '2017-7-28' ),
  (null, '11期', 'php',         '王林',    '2017-9-20' ),
  (null, '6期',  '安卓',        '木婉清',  '2017-9-28' ),
  (null, '7期',  'ios',         '香香姐',  '2017-5-18' ),
  (null, '6期',  '人工智能',    '发哥',    '2017-9-28' ),
  (null, '3期',  '生物技术',    '龙仔',    '2017-2-3' ),
  (null, '5期',  '农学',        '大妖',    '2018-1-3' ),
  (null, '30期', '化学',        '花海界',  '2015-12-28' );




# 学生表
# 学号 姓名 年龄 性别 班级  手机号 电子照片
create table student (
  stu_id int primary key auto_increment,
  stu_name varchar(8) not null unique key,
  stu_age tinyint not null default 25,
  stu_sex char(2) not null default '人妖',
  stu_class varchar(15) not null,#要修改 不能用varchar 用其他形式
  stu_tel char(11) not null,
  stu_pic varchar(50)
);
/*insert into student values
  (null, '李暮婉', 20, '女', '1', '13476681777', '' ),
  (null, '木冰眉', 20, '女', '12期', '13476681777', '' ),
  (null, '蕾姆', 20, '女', '12期', '13476681777', '' );*/
  /*(null, '', 20, '女', '12期', '13476681777', '' ),
  (null, '李暮婉', 20, '女', '12期', '13476681777', '' ),
  (null, '李暮婉', 20, '女', '12期', '13476681777', '' ),
  (null, '李暮婉', 20, '女', '12期', '13476681777', '' ),
  (null, '李暮婉', 20, '女', '12期', '13476681777', '' ),
  (null, '李暮婉', 20, '女', '12期', '13476681777', '' ),*/
# 人工添加
# 不能提前写了

# insert into student values (null, 'Long','','', '','13476668888','');
foreach ($stu as $k => $v) {

}
insert into student ($k) values ('$v');