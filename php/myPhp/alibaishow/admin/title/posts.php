<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
  <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/css/admin.css">
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
<?php

/**
 * 先将页面的数据渲染出来，再具体取查数据
 */
//连接数据库
$link = mysql_connect('localhost: 3306', 'root', 'root');
mysql_query('set names utf8');
mysql_query('use ali');
$sql1 = 'select cate_name, cate_id from categories';
$res1 = mysql_query($sql1);

/**
 * 连接数据库获取数据 三表联查

所有分类 categories -> cate_name
作者     ali_user   -> user_nickname

标题       状态（发布 未发布）   发表时间  状态
tit_title   tit_status        tit_uptime
需要获取五个值
*/
//需要进行筛选
/*第一次没有传值，全部查询出来；
第二次筛选才可以进行分类查询*/
/**
 * 先要判断是否赋值 categories -> cate_name  tit_status
 */


$cate_id   = isset($_GET['one']) ? $_GET['one'] : 0; //
$tit_status  = isset($_GET['two']) ? $_GET['two'] : 0;
$where = ' ';
if($cate_id) {
    $where .= "cate_id = $cate_id and ";//注意空格
}
if ($tit_status) {
    $where .= "tit_status = $tit_status and ";//注意空格

}
$where .= "1";//用来连接  当where and 1 时 不会报错

//----------------------------------------------------------
//分页处理
/**
 * 每页显示3条
 * 偏移量 以及总页数
 */

$sql2 =  "select count(*) as num from ali_title as a join
categories as b on a.tit_cateid = b.cate_id join
ali_user as c on a.tit_author = c.user_id where $where";
$res2 = mysql_query($sql2);
$arr  = mysql_fetch_assoc($res2);
$num  = $arr['num'];
//echo($num);

//传参过来的页码

$pageinfo = isset($_GET['pageinfo'])? $_GET['pageinfo'] : 1;

$pagesize = 3;
$page     = ceil($num/$pagesize); //总共多少页
$offset   = ($pageinfo - 1) * $pagesize;

//---------------------------------------------------------






$sql = "select tit_id,cate_name, user_nickname, tit_title, tit_status, tit_updtime from ali_title as a join
categories as b on a.tit_cateid = b.cate_id join
ali_user as c on a.tit_author = c.user_id where $where limit $offset,$pagesize";
$res = mysql_query($sql);


?>

  <script>NProgress.start()</script>
  <?php include_once '../commin/session.php';?>
  <div class="main">
      <?php include "../commin/nav.php";?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="post-add.html" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>

        <form class="form-inline" action='./posts.php' method='get'>
          <select name="one" class="form-control input-sm">
            <option value="0">所有分类</option>
              <?php while ($row1 = mysql_fetch_assoc($res1)) { ?>
            <option value="<?= $row1['cate_id']?>" <?= $row1['cate_id'] == $cate_id? 'selected' : ''?>><?= $row1['cate_name']?></option>
              <?php }?>
          </select>
          <select name="two" class="form-control input-sm">
            <option value="">所有状态</option>
            <option value="0" <?= $tit_status == 0? 'selected': ''?> >草稿</option>
            <option value="1" <?= $tit_status == 1? 'selected': ''?> >已发布</option>
          </select>
          <button class="btn btn-default btn-sm">筛选</button>
          </form>

        <ul class="pagination pagination-sm pull-right">
          <li><a href="#">上一页</a></li>
            <?php for($i = 1; $i <= $page; $i++) { ?>
          <li><a href="./posts.php?pageinfo=<?= $i?>&one=<?= $cate_id?>&two=<?= $tit_status?>"><?= $i?></a></li>
            <?php }?>
          <li><a href="#">下一页</a></li>
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
        <?php while($row = mysql_fetch_assoc($res)) {?>
<!--            cate_name, user_nickname, tit_title, tit_status, tit_updtime-->
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td><?= $row['tit_title']?></td>
            <td><?= $row['user_nickname']?></td>
            <td><?= $row['cate_name']?></td>
            <td class="text-center"><?= date('Y/m/d',$row['tit_updtime'])?></td>
            <td class="text-center"><?= $row['tit_status'] == 1 ? '发布': '未发布'?></td>
            <td class="text-center">
              <a href="./post-update.php?tit_id=<?= $row['tit_id'] ?>" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" aaa="<?= $row['tit_id']?>" class="del btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>


  </div>


  <div class="aside">
    <?php
      include_once '../commin/comminAside.php';
    ?>
  </div>

  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
<script>
//    文章删除
    $('.del').click(function(){
//        var id = $(this).attr('data_id');为什么 data不行
        var id = $(this).attr('aaa');
//        console.log(id);
        $.ajax({
            url: './delete-del.php',
            data: {id: id},
            type: 'get',
            dataType: 'text',
            success: function(data) {
                console.log(data);
            }
        })
    })
</script>
</body>
</html>


<!--//必须是get传值 因为form表单和a链接要使用一样的 因而form表单也被要求使用get传值 -->
<!--虽然是同一页面 但是form表单数据和a链接的数据互不干扰-->

