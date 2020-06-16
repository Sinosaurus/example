<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">

    <?php include_once './commin/commin.php'?>
    <div class="content">
      <div class="panel new">
          <?php
          $link = mysql_connect('localhost:3306', 'root', 'root');
          mysql_query('set names utf8');
          mysql_query('use ali');
          $id = $_GET['id'];
          $sql = "select cate_name from categories where cate_id = $id";
          $res = mysql_query($sql);
          $row = mysql_fetch_assoc($res);
          $aa  = $row['cate_name'];
          ?>

        <h3><?= $aa?></h3>

          <?php

            $sql = "select tit_id,cate_name, tit_title, user_nickname, tit_updtime, tit_desc, tit_file, tit_click, tit_good, num from ali_title t  join ali_user u on t.tit_author = u.user_id 
                  join categories c on t.tit_cateid = c.cate_id 
                  left join 
                  (select cmt_poseid, count(*) as num from ali_comment group by cmt_poseid) as m on m.cmt_poseid = t.tit_id
                   where cate_id = $id
                  order by tit_updtime desc limit 0, 3";
            $res = mysql_query($sql);

          ?>
          <?php while($row = mysql_fetch_assoc($res)) {?>
              <div class="entry">
                  <div class="head">
                      <a href="/detail.php?id=<?= $row['tit_id']?>"><?= $row['tit_title']?></a>
                  </div>
                  <div class="main">
                      <p class="info"><?= $row['user_nickname']?> 发表于 <?= date('Y-m-d',$row['tit_updtime'])?></p>
                      <p class="brief"><?= $row['tit_desc']?></p>
                      <p class="extra">
                          <span class="reading">阅读(<?= $row['tit_click']?>)</span>
                          <span class="comment">评论(<?= $row['num']?>)</span>
                          <a href="javascript:;" class="like">
                              <i class="fa fa-thumbs-up"></i>
                              <span>赞(<?= $row['tit_good']?>)</span>
                          </a>
                          <a href="javascript:;" class="tags">
                              分类：<span>花</span>
                          </a>
                      </p>
                      <a href="javascript:;" class="thumb">
                          <img src="/admin/uploads/<?= $row['tit_file']?>" alt="">
                      </a>
                  </div>
              </div>
          <?php }?>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
</body>
</html>
