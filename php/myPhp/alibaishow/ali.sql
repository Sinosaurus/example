# 设置ali的数据库
set names gbk; #此时只能复制粘贴，不能导入，  若是导入需要设置为utf8 因为此时文档为utf8 的字符集

create database ali;

# 选择库
use ali;

# 创建表
create table categories (
  cate_id int unsigned primary key auto_increment,
  cate_name varchar(10) not null unique key comment '分类名称',
  cate_slug varchar(10) not null unique comment '分类别名',
  cate_class varchar(10) not null unique comment '分类字体图标',
  cate_status tinyint default 1 comment '文章是否依旧使用 1 启用 0 禁用',
  cate_show tinyint default 1 comment '分类是否显示 1 显示 0不显示'
) charset gbk;


insert into categories values (null, '潮科技', '花花', 'font-phone', 1 , 0),
  (null, '会生活', '水水', 'font-a', 0 , 1);