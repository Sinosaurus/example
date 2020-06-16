-- 创建天猫表格
use tmall;
create table cat11(
  goods_id int,
  cat_prices tinyint,
  cat_name varchar(10),
  cat_num char(10),
  cat_create date comment "创建时间",
  cat_src text
)charset gbk;