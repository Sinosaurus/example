create table ali_pic(
  pic_id int unsigned auto_increment primary key,
  pic_path varchar(100) not null comment '上传文件保存路径',
  pic_txt varchar(30) not null comment '文本标题',
  pic_link varchar(30) not null comment '文章链接地址',
  pic_state tinyint not null default '0' comment '0 显示 1 不显示'
) charset gbk;