create table ali_menber (
  menber_id int unsigned primary key auto_increment,
  menber_name varchar(30) unique key not null comment '会员名 用来登录',
  menber_nickname varchar(30) unique not null comment '会员昵称',
  number_password char(32) not null comment '会员密码'
) charset gbk;

create table ali_comment (
  cmt_id int unsigned primary key auto_increment,
  cmt_memid int unsigned not null comment '评论人，和member中menber_id匹配',
  cmt_content varchar(100) not null comment '评论内容',
  cmt_userid int unsigned not null comment '审核人id， 和ali_user中user_id对应',
  cmt_poseid int unsigned comment '评论文章id， 和 ali_title中tit_id对应',
  cmt_time date  comment '评论时间',
  cmt_state enum('0', '1') default '0' comment '0 驳回 1 批准'
) charset gbk;

insert into ali_menber values (null, '911@qq.com', '今何在', '123123'),
  (null, '110@qq.com', '王林', '123123'),
  (null, '120@qq.com', '孽海花', '123123'),
  (null, '900@qq.com', '木婉清', '123123'),
  (null, '119@qq.com', '逍遥子', '123123');
/*+-----------+-------------+-----------------+-----------------+
| menber_id | menber_name | menber_nickname | number_password |
+-----------+-------------+-----------------+-----------------+
|         1 | 911@qq.com  | 今何在                | 123123          |
|         2 | 110@qq.com  | 王林                | 123123          |
|         3 | 120@qq.com  | 孽海花                | 123123          |
|         4 | 900@qq.com  | 木婉清               | 123123          |
|         5 | 119@qq.com  | 逍遥子               | 123123          |
+-----------+-------------+-----------------+-----------------+*/
insert into ali_comment values
  (null, 1, '神挡杀神，佛挡杀佛', 5, 1, '2018/2/1', 1),
  (null, 2, '婉儿，我带你去杀人', 6, 2, '2018/2/5', 1),
  (null, 2, '海上花生花海晏', 9, 3, '2018/2/2', 1),
  (null, 3, '无令木石心，常笑人脆弱', 12, 4, '2018/2/1', 1),
  (null, 4, '妖猫传', 3, 3, '2018/2/3', 0),
  (null, 5, '我花时间买天分', 1, 4, '2018/2/1', 1);

insert into ali_comment values
  (null,3, '我的小鱼你醒了还记得早晨么', 1, 4, '2018/1/2', 1,1 ),
  (null,3, '昨夜你曾经说，愿夜幕永不开启', 1, 5, '2018/1/2', 1,1 ),
  (null,3, '你的香腮边轻轻滑落的，是你的泪，还是我的泪', 1, 4, '2018/1/2', 1 ,1),
  (null,3, '初吻吻别的那个季节，不是已经哭过了吗', 1, 6, '2018/1/2', 1,1),
  (null,3, '我的指尖还记忆着，你慌乱的心跳', 1, 2, '2018/1/2', 1,1 ),
  (null,3, '温润的体香里，那一缕长发飘飘', 1, 3, '2018/1/2', 1, 1 );