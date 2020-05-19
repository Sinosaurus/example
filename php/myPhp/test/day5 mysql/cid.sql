create database apple;
use apple;
create table apple_p (
  id int primary key auto_increment,
  cid int,
  name varchar(15) not null,
  price decimal(4),
  pub_date date
);
insert into apple_p values
  (null,4,'ipad pro',3000,'2015-12-14'),
  (null,4,'ipad mini',1500,'2016-02-13'),
  (null,4,'ipad air',2000,'2017-03-13'),
  (null,5,'iphone7',6000,'2015-09-09'),
  (null,5,'iphone 6s',6600,'2016-10-09'),
  (null, 6,'apple watch s2',3600, '2015-03-09');

create table apple_c (
  id int primary key auto_increment,
  name varchar(10) not null,
  seq char(3)
);

insert into apple_c values
  (null, 'ipad', 100),
  (null, 'iphone',103),
  (null, 'watch', 104);


-- limit 限定每次显示的数据量，不用一直显示完，这样方便与查看，每次显示固定量，类似分页

select 字段列表 from 表名 limit 偏移量（类似定位中的left 每页为一张图片， 要看到第n张，只需 偏移 n-1 即可） ， 每页显示的行数


-- 每张为pagesize 要到达的位置
-- （n-1）* pagesize



select * from 表名 limit 4, 2; // 其中 4 为 （3- 1）*2 ， 2 为每页显示 2 行  也就是显示第三页

当只有一个值是，表示显示首页 显示该值数

顺序为
select 字段列表 from 表名 （where 条件）（group of 对应字段分组） (limit )；



-- select * from apple_p where cid > 2  group of cid;

-- 连接查询 子查询

select * from 表1 join表二 表一cid = 表二id
/* 可以修改 表一 的id
-- 取别名 * 修改为  表一 id as 别名id
*/

select apple_p.id as goods_id , apple_p.name as goods_name, apple_c.name as cat_name from apple_p join apple_c on apple_p.cid = apple_c.id;