# 建立管理员表格
#编号  int  primery key auto_incrept
#姓名  varchar(20) not null unique key
#密码    char(32) not null #用md5进行加密
set names gbk;

use students;

create table admin (
  id int primary key auto_increment,
  name varchar(20) not null unique key,
  password char(32) not null
);

# 提前录入几个数据

insert into admin values (null, 'long', 'e10adc3949ba59abbe56e057f20f883e');