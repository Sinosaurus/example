# 创建库
#   books
# 设置字符集
# gbk
# 选择库
# books
# 创建表格
# book1
# 增删改查

set names utf8; # 必须设置为utf8 因为这里的编码器是 utf8 而去mysql是另外查看，再单独另外设置
# 一个是直接操作 库  另一个是通过其他来操作

create database books;

use books;

create table book1 (
  b_id int primary key auto_increment,
  b_name varchar(30) not null unique key,
  b_author varchar(20),
  b_like char(4) default "like"
)charset gbk;

insert into book1 values (null, '《皮囊》', '' , 'like'),
                         (null, '《亲爱的三毛》', '三毛', 'like'),
                         (null, '《文化苦旅》', '余秋雨', 'like'),
                         (null, '《千年一叹》', '余秋雨', 'like'),
                         (null, '《浮生六记》', '沈复', 'like');