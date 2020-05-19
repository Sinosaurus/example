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
      <?php
      $link = mysql_connect('localhost:3306', 'root', 'root');
      mysql_query('set names utf8');
      mysql_query('use ali');

      $id = $_GET['id'];

      $sql = "select tit_id,cate_name, tit_title,tit_content, user_nickname, tit_updtime, tit_desc, tit_file, tit_click, tit_good, num from ali_title t                     join ali_user u on t.tit_author = u.user_id 
                  join categories c on t.tit_cateid = c.cate_id 
                  left join 
                  (select cmt_poseid, count(*) as num from ali_comment group by cmt_poseid) as m on m.cmt_poseid = t.tit_id where tit_id = $id";
      $res = mysql_query($sql);
      $arr = mysql_fetch_assoc($res);

      ?>
    <div class="content">
      <div class="article">
        <div class="breadcrumb">
          <dl>
            <dt>当前位置：</dt>
            <dd><a href="javascript:;"><?= $arr['cate_name']?></a></dd>
            <dd><?= $arr['tit_title']?></dd>
          </dl>
        </div>
        <h2 class="title">
          <a href="javascript:;"><?= $arr['tit_title']?></a>
          </h2>
          <div>
<!--              用来解析html中的代码-->
              <?= htmlspecialchars_decode($arr['tit_content'])?>
          </div>

        <div class="meta">
          <span><?= $arr['user_nickname']?> 发布于 <?= date('Y-m-d',$arr['tit_updtime'])?></span>
          <span>分类: <a href="javascript:;"><?= $arr['cate_name']?></a></span>
          <span>阅读: (<?= $arr['tit_click']?>)</span>
          <span>评论: (<?= $arr['num']?>)</span>
        </div>
      </div>
     <?php include_once './commin/hots.php'?>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
</body>
</html>
