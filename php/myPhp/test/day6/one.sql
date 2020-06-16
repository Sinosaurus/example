#创建表格
 create table jd_goods (
  goods_id int primary key auto_increment,
  goods_name varchar(30) not null unique key,
  price decimal(7, 2) not null default 300,
  cat_name varchar(20),
  sales int not null default 0,
  is_post_free tinyint not null default 1 comment '1包邮 0不包邮',
  pics varchar(200)
 );
insert into jd_goods values
  (null, '凌美', 123.5, '笔',  72, 1, '1.jpg'),
  (null, '施耐德', 50.5, '笔',  200, 1, '2.jpg'),
  (null, '百乐', 100.5, '笔',  130, 0, '13.jpg'),
  (null, '英雄', 333.5, '笔',  1200, 1, '4.jpg'),
  (null, '派克', 500.5, '笔',  20, 0, '5.jpg'),
  (null, '百乐墨水', 30.5, '墨水',  120, 1, '6.jpg'),
  (null, '鲶鱼', 80, '墨水',  20, 1, '7.jpg'),
  (null, '英雄墨水', 16.5, '墨水',  5000, 1, '8.jpg'),
  (null, '墨水1', 50, '墨水',  710, 0, '9.jpg');
#分组
select goods_name, price, sales from jd_goods /*drop by */cat_name;//只会显示每组中第一个
select goods_name, price, sales , count(*) from jd_goods group by cat_name;
#分页
select * from jd_goods limit 3,3;