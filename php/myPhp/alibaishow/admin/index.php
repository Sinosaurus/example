<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
    <script src="/assets/vendors/echarts.js"></script>

</head>
<body>
  <script>NProgress.start()</script>
  <?php include_once './commin/session.php';?>
  <div class="main">
      <?php include "/commin/nav.php";?>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>挥毫泼墨, 妙笔生花</h1>
        <p>腹有诗书气自华</p>
        <p><a class="btn btn-primary btn-lg" href="/admin/title/post-add.php" role="button">写文章</a></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>

              <?php
                 $link = mysql_connect('localhost: 3306', 'root', 'root');
                 mysql_query('set names utf8');
                 mysql_query('use ali');
                 /*$sql = "select tit_status, count(tit_status) as num from ali_title group by tit_status";
              select count(cate_name) from categories;
               select count(cmt_content) from ali_comment group by cmt_state

              select count(tit_status) as t, count(cate_name) as c, count(cmt_content) as m from ali_title as a join
              categories as b on a.tit_cateid = b.cate_id join ali_comment d on a.tit_id = d.cmt_poseid group by tit_status;*/
              /**
               * 还是分开写
               */

              $sql1 = "select tit_status, count(tit_status) as num from ali_title group by tit_status";
              $sql2 = "select count(cate_name) as num from categories";
              $sql3 = "select cmt_state, count(cmt_content) as num from ali_comment group by cmt_state";
              $res1 = mysql_query($sql1);
              $res2 = mysql_query($sql2);
              $res3 = mysql_query($sql3);
              $new = [];
              while($row = mysql_fetch_assoc($res1)) {
                  $new[] = $row;
              }
              $arr2 = mysql_fetch_assoc($res2);
              $new3 = [];
              while($row3 = mysql_fetch_assoc($res3) ){
                  $new3[] = $row3;
              }
              // 文章
//              发布
              $t_f = $new[1]['num'];
              $t_w = $new[0]['num'];
//              分组
              $c_f = $arr2['num'];
//              评论
              $m_g = $new3[1]['num'];
              $m_w = $new3[0]['num'];

              ?>



            <ul class="list-group">
              <li class="list-group-item"><strong><?= $t_f + $t_w?></strong>篇文章（<strong><?= $t_w?></strong>篇草稿）</li>
              <li class="list-group-item"><strong><?= $c_f?></strong>个分类</li>
              <li class="list-group-item"><strong><?= $m_g + $m_w?></strong>条评论（<strong><?= $t_w?></strong>条待审核）</li>
            </ul>
          </div>
        </div>
        <div class="col-md-8">
            <div id="main" style="width: 400px;height:250px;"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="aside">
    <?php
      include_once './commin/comminAside.php';
    ?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script>
      // 基于准备好的dom，初始化echarts实例
      var myChart = echarts.init(document.getElementById('main'));

      // 指定图表的配置项和数据
      var option = {
          title: {
              text: '阿里百秀'
          },
          tooltip: {},
          legend: {
              data:['数值']
          },
          xAxis: {
              data: ["文章","草稿","分类","评论","未审核"]
          },
          yAxis: {},
          series: [{
              name: '数量',
              type: 'bar',
              data: [<?= $t_f?>, <?= $t_w?>, <?= $c_f?>, <?= $m_g?>, <?= $m_w?>]
          }]
      };

      // 使用刚指定的配置项和数据显示图表。
      myChart.setOption(option);
  </script>
</body>
</html>
