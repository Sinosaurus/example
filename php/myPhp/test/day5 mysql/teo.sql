create table tma (
  tm_id int primary key auto_increment,
  tm_name varchar(20) not null unique key,
  tm_tel char(11) not null,
  tm_price decimal(5, 3) not null default "100",
  tm_time datetime comment '年',
  tm_pp char(2) not null default "红色"
);

-- 如何插入数据
insert into tma (tm_tel, tm_id) values(13477767777, 1);
insert into tma values (null, '龙',17787776777,555.00,'2018-1-2','蓝色');
insert into tma values
(15, '小河流淌', 13445642584, 22121.0, null, 'yellow');

insert into tma (tm_id,tm_price) values (null,11.2);

-- 修改内容
 update tma set tm_price = 50.2 where tm_id = 1;

-- 删除内容；

delete from tma where tm_id =2;
-- 引入多条
insert into tma (tm_id, tm_name ) values (null, '花下'),(null, '花下弄影') ;
insert into tma (tm_id, tm_name) values (null, '花下弄影');

-- where 条件
-- #在mysql中可以用# 注释

-------------------------------------------------------------------
-- '''''' where 条件一 and 条件二

-------------------------------------
-- group by 子句

-- cid 分类 字段

-- 导入测试数据
source 路径 （绝对路径） e:/ 某某.sql


select 字段列表 from 表名  group by 组 --分多少组


-- 分组是为了统计

