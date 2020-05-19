create table ali_user (
  user_id int unsigned primary key auto_increment,
  user_email varchar(30) unique not null comment '用户名',
  user_slug varchar(20) unique key not null comment '别名',
  user_nickname varchar(20) unique key not null comment '昵称',
  user_password char(32) not null comment 'md5加密',
  user_pic varchar(200) not null comment '图像路径',
  user_status tinyint not null default 1 comment '状态 1 显示 0 隐藏'
) charset gbk;

insert into ali_user values
  (null, '1@sina.com', 'wl', '王林', md5('1230'), './1122.png', 1),
  (null, '2@sina.com', 'wl1', '木婉清', md5('1230'), './1122.png', 1),
  (null, '3@sina.com', 'wl2', '木心', md5('1230'), './1122.png', 1),
  (null, '4@sina.com', 'wl3', '石心', md5('1230'), './1122.png', 0),
  (null, '5@sina.com', 'wl4', '银春', md5('1230'), './1122.png', 1),
  (null, '6@sina.com', 'wl5', '宝玉', md5('1230'), './1122.png', 1),
  (null, '7@sina.com', 'wl6', '黛玉', md5('1230'), './1122.png', 1),
  (null, '8@sina.com', 'wl7', '宝钗', md5('1230'), './1122.png', 1),
  (null, '9@sina.com', 'wl8', '探春', md5('1230'), './1122.png', 0),
  (null, '10@sina.com', 'wl9', '秦可卿', md5('1230'), './1122.png', 1),
  (null, '11@sina.com', 'wl0', '元春', md5('1230'), './1122.png', 1),
  (null, '12@sina.com', 'wl11', '贾母', md5('1230'), './1122.png', 1),
  (null, '13@sina.com', 'wl12', '悟空', md5('1230'), './1122.png', 0),
  (null, '14@sina.com', 'wl13', '八戒', md5('1230'), './1122.png', 1),
  (null, '15@sina.com', 'wl14', '沙僧', md5('1230'), './1122.png', 1),
  (null, '16@sina.com', 'wl15', '黄梅', md5('1230'), './1122.png', 0),
  (null, '17@sina.com', 'wl16', '花无殇', md5('1230'), './1122.png', 1),
  (null, '18@sina.com', 'wl17', '洛天', md5('1230'), './1122.png', 1),
  (null, '19@sina.com', 'wl18', '星河', md5('1230'), './1122.png', 1),
  (null, '20@sina.com', 'wl19', '天星阁', md5('1230'), './1122.png', 0);