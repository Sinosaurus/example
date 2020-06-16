-- cmd中


-- mysql
-- 连接到库
mysql -hlocalhost -uroot -proot
-- 设置字符集
set names ntf8;
-- 增删改查
-- 增
create database 库名 charset gbk;
create database 库名;
-- 删
drop database 库名;
-- 改
alter database 库名 charset utf8;
-- 只能修改字符集 库名已经修改不了

-- 若是输入错误
-- 直接末尾添加 ';'
-- 重新开始输入
-- 查
show databases;
show create database 库名;

-- 退出mysql
exit;



-- -------------------------------------------------------------------------------------------
-- 选择库
use 库名;

-- 增删改查
-- 查
-- 查看当前库所有表格
show tables;
-- 或者简单点
show tables from 库名;
-- 查看表格结构
desc 表名；
-- 查看表的创建表名
-- show create table 表名

-- 增
create table 表名 (
--   表头 数据类型
  stu_id int,
  stu_tel char(11)
)charset gbk; //指定字符集

-- 改
--   修改表名
     alter table 表名 rename 新表名;
--     修改表中字段的数据类型
    alter table 新表名 modify 字段 char(3);//char可以使其他数据类型
-- 修改表中字段名字
alter table 新表名 change 字段 新字段 数据类型; //修改字段必须要同时指定数据类型
-- 修改表中添加字段 (可以指定具体位置)
alter table 新表名 add 字段 数据类型;
alter table 新表名 add 字段 数据类型 first;//first 为指定位置
alter table 新表名 add 字段 数据类型 after 某个字段;//在某个字段后面
-- 删除字段
alter table 表名 drop 字段名;
-- 修改表中字符集
alter table 新表名 charset 字符集;

-- 删
  drop table 表名;
