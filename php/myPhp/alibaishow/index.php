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
      <div class="swipe">
          <?php
          /**
           * 查询数据库
           */
          $sql = "select * from ali_pic where pic_state = 1 limit 4";
          $res = mysql_query($sql);

          ?>
        <ul class="swipe-wrapper">
          <?php while($row = mysql_fetch_assoc($res)) {?>
          <li>
            <a href="#">
              <img src="/admin/uploads/<?= $row['pic_path']?>">
              <span><?= $row['pic_txt']?></span>
            </a>
          </li>
            <?php }?>
        </ul>
        <p class="cursor"><span class="active"></span><span></span><span></span><span></span></p>
        <a href="javascript:;" class="arrow prev"><i class="fa fa-chevron-left"></i></a>
        <a href="javascript:;" class="arrow next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <div class="panel focus">



          <?php
          /**
           * 选择使用点赞多的文章，虽然 原本是使用 推荐一个字段的
           */
          $sql = "select tit_file, tit_title from ali_title order by tit_good desc limit 5";
          $res = mysql_query($sql);
          $num = 0; //用来进行判断的 因为焦点中 第一张图需要加入class类名
          ?>

        <h3>焦点关注</h3>
        <ul>
            <?php while($row = mysql_fetch_assoc($res)) { ?>
          <li class="<?= $num == 0 ? 'large' : ''?>">
            <a href="javascript:;">
              <img src="/admin/uploads/<?= $row['tit_file']?>" alt="">
              <span><?= $row['tit_title']?></span>
            </a>
          </li>
            <?php  $num++ ;}?>
        </ul>
      </div>
      <div class="panel top">

          <?php
//             通过ali_tit 来获取相应的数据
//           需要进行排序  先按点击量 再按时间
             $sql = "select tit_title, tit_good, tit_click from ali_title order by tit_updtime desc, tit_click desc limit 5";
             $res = mysql_query($sql);
             $num = 1;
          ?>
        <h3>一周热门排行</h3>
        <ol>
            <?php while($row = mysql_fetch_assoc($res)) {?>
          <li>
            <i><?= $num?></i>
            <a href="javascript:;"><?= $row['tit_title']?></a>
            <a href="javascript:;" class="like">赞(<?= $row['tit_good']?>)</a>
            <span>阅读 (<?= $row['tit_good']?>)</span>
          </li>
            <?php $num++; }?>

        </ol>
      </div>
        <?php include_once './commin/hots.php'?>
      <div class="panel new">
          <?php

          /* 中点如何求num 评论数目多少 以及再添加另一张表中
           , num
           $sql = "select cmt_poseid, count(*) as num from ali_comment group by cmt_poseid";
 */

          //            以
          $sql = "select tit_id,cate_name, tit_title, user_nickname, tit_updtime, tit_desc, tit_file, tit_click, tit_good, num from ali_title t                     join ali_user u on t.tit_author = u.user_id 
                  join categories c on t.tit_cateid = c.cate_id 
                  left join 
                  (select cmt_poseid, count(*) as num from ali_comment group by cmt_poseid) as m on m.cmt_poseid = t.tit_id
                  order by tit_updtime desc limit 1, 3";
          $res = mysql_query($sql);
          ?>
        <h3>最新发布</h3>
          <?php while($row = mysql_fetch_assoc($res)) {?>
          <div class="entry">
          <div class="head">
            <span class="sort"><?= $row['cate_name']?></span>
            <a href="/detail.php?id=<?= $row['tit_id']?>"><?= $row['tit_title']?></a>
          </div>
          <div class="main">
            <p class="info"><?= $row['user_nickname']?> 发表于 <?= date('Y-m-d',$row['tit_updtime'])?></p>
            <p class="brief"><?= $row['tit_desc']?></p>
            <p class="extra">
              <span class="reading">阅读(<?= $row['tit_click']?>)</span>
              <span class="comment">评论(<?= $row['num'] == '' ? '0' : $row['num']?>)</span>
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
  <script src="assets/vendors/jquery/jquery.js"></script>
  <script src="assets/vendors/swipe/swipe.js"></script>
  <script>
    //
    var swiper = Swipe(document.querySelector('.swipe'), {
      auto: 3000,
      transitionEnd: function (index) {
        // index++;

        $('.cursor span').eq(index).addClass('active').siblings('.active').removeClass('active');
      }
    });

    // 上/下一张
    $('.swipe .arrow').on('click', function () {
      var _this = $(this);

      if(_this.is('.prev')) {
        swiper.prev();
      } else if(_this.is('.next')) {
        swiper.next();
      }
    })
  </script>
</body>
</html>
