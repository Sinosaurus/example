create table tao_userdelect(
  tao_id int,
  tao_goods varchar(15),
  tao_price tinyint,
  tao_add varchar(30),
  tao_tel char(11),
  tao_create datetime comment "创建时间",
  tao_intro text,
  tao_other decimal
) charset gbk;