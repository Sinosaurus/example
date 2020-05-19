-- 创建京东库
-- 创建表格
-- jd_shop
create database jd;
show create database jd;
-- 创建表格
use jd;
show tables;
create table jd_goods(
  jd_id int,
  jd_goods_name varchar(10),
  jd_price tinyint,
  jd_pos text,
  jd_time datetime comment "下单时间"
);
);