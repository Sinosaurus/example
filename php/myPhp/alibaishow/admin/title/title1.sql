create table ali_title (
  tit_id int unsigned primary key auto_increment,
  tit_title varchar(30) unique key not null comment '文章标题',
  tit_slug varchar(30) unique not null comment '文章别名',
  tit_desc varchar(200) not null comment '摘要',
  tit_content text not null comment '文章内容',
  tit_author int not null comment '作者id 作者与ali_user user_id 的字段进行关联',
  tit_cateid int not null comment '分类id 与category的id进行关联',
  tit_file varchar(200) not null comment '文章图片',
  tit_addtime int unsigned not null comment '文章添加时间',
  tit_updtime int unsigned not null comment '文章修改时间',
  tit_click int unsigned not null comment '文章点击量',
  tit_good int unsigned default 10 comment '点赞',
  tit_bad int unsigned default 0 comment '踩',
  tit_status enum('草稿', '已发布') default '草稿' comment '发布状态'
) charset gbk;


insert into ali_title values
  (null, )